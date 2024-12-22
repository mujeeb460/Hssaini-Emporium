<?php

namespace App\Http\Controllers\Api\Customer;

use App\Events\Customer\AccountCreated;
use Carbon\Carbon;
use App\Models\Customer;
use App\Traits\RestTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\VerificationCode;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Api\Controller;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\LoginOTPResource;
use App\Http\Requests\Api\Customer\LoginRequest;
use App\Http\Requests\Api\Customer\LoginOTPRequest;
use App\Http\Requests\Api\Customer\RegisterRequest;
use App\Traits\DeviceTokenTrait;
use Throwable;
use Twilio;

class AuthController extends Controller
{
    use RestTrait, DeviceTokenTrait;
    /**
     * Register a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        try {
            DB::beginTransaction();
            $user = new Customer;

            // Upload and update new picture
            if ($request->hasFile('picture')) {
                $newPhotoPath = $request->file('picture')->store('images/profile/customer');
                $user->picture = $newPhotoPath;
            }

            $user->fill([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'gender' => $request->gender,
            ]);
            $user->save();
            DB::commit();

            event(new AccountCreated($user));

            return $this->sendSuccessResponse(new CustomerResource($user));
        } catch (\Throwable $th) {
            DB::rollback();
            return $this->sendErrorResponse('Error while registration');
        }
    }

    /**
     * Log in a user and issue a token.
     *
     * @param  LoginRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        try {
            $credentials = ['password' => $request->password];

            if (is_numeric($request->login_field)) {
                $credentials['phone'] = $request->login_field;
            } elseif (filter_var($request->login_field, FILTER_VALIDATE_EMAIL)) {
                $credentials['email'] = $request->login_field;
            } else {
                $credentials['username'] = $request->login_field;
            }

            if (!Auth::guard('customer')->attempt($credentials)) {
                return $this->sendErrorResponse('The provided credentials are invalid.');
            }

            $user = Auth::guard('customer')->user();

            $this->createDeviceToken($request, $user);

            $token = $user->createToken('customer_token', ['customer'])->plainTextToken;

            return $this->sendCustomResponse([
                'success' => true,
                'data' => new CustomerResource($user),
                'token' => $token,
                'message' => 'Success',
            ]);
        } catch (\Throwable $th) {
            return $this->sendErrorResponse('Something went wrong while login.');
        }
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return $this->sendSuccessResponse([]);
    }

    // public function forgotPassword(Request $request)
    // {
    //     if ($request->has('email')) {
    //         return $this->sendResetLinkEmail($request);
    //     } elseif ($request->has('phone')) {
    //         // Implement the method to send reset link to phone number
    //     } else {
    //         return response()->json(['message' => 'Please provide email or phone to reset password'], 400);
    //     }
    // }

    public function forgotPassword(Request $request)
    {
        if (is_numeric($request->login_field)) {
            $credentials['phone'] = $request->login_field;
        } elseif (filter_var($request->login_field, FILTER_VALIDATE_EMAIL)) {
            $user = Customer::where('email', $request->login_field)->first();
            $verification = VerificationCode::where(['user_id' => $user->id, 'guard' => 'customer'])->latest()->first();
            $now = Carbon::now();

            if ($verification && $now->isBefore($verification->expire_at)) {
                $data = $verification;
            } else {
                $data = VerificationCode::create([
                    'user_id' => $user->id,
                    'guard' => 'customer',
                    'otp' => rand(123456, 999999),
                    'expire_at' => Carbon::now()->addMinutes(2)
                ]);
            }
        } else {
            $credentials['username'] = $request->login_field;
        }
        return new LoginOTPResource($data);
    }

    function resetLink(Request $request) {
        $request->validate([
            'user_id' => 'required|exists:customers,id',
            'otp' => 'required',
            'password'=>'required|min:6',
            'conform_password'=> 'required_with:password|same:password|min:6'
        ]);

        $verification = VerificationCode::where(['user_id' => $request->user_id, 'guard' => 'customer', 'otp' => $request->otp])->latest()->first();

        $now = Carbon::now();

        if (!$verification) {
            return $this->sendErrorResponse('Invalid OTP','400');
        } else if ($verification && $now->isAfter($verification->expire_at)) {
            return $this->sendErrorResponse('Your OTP has been expired');
        }

        $customer = Customer::findOrFail($request->user_id);
        $customer->update([
            'password' => Hash::make($request->password)
        ]);

        return $this->sendSuccessResponse([],"Password successfully updated");

    }

    public function loginOTP(LoginOTPRequest $request)
    {
        $user = Customer::where('phone',$request->login_field)->first();
        $verification = VerificationCode::where(['user_id'=>$user->id,'guard'=>'customer'])->latest()->first();
        $now = Carbon::now();

        if($verification && $now->isBefore($verification->expire_at))
        {
            $data = $verification;
        }
        else
        {
            $data = VerificationCode::create([
                'user_id'=> $user->id,
                'guard'=>'customer',
                'otp'=> rand(123456,999999),
                'expire_at'=> Carbon::now()->addMinutes(2)
            ]);
        }

        return new LoginOTPResource($data);
    }

    public function loginOTPVerification(Request $request)
    {
        $request->validate([
            'user_id'=>'required|exists:customers,id',
            'otp'=>'required',
        ]);

        $verification = VerificationCode::where(['user_id'=>$request->user_id,'guard'=>'customer','otp'=>$request->otp])->latest()->first();

        $now = Carbon::now();

        if(!$verification)
        {
            return $this->sendErrorResponse('Invalid OTP');
        }
        else if($verification && $now->isAfter($verification->expire_at))
        {
            return $this->sendErrorResponse('Your OTP has been expired');
        }

        $user = Customer::where('id',$request->user_id)->first();

        Auth::guard('customer')->login($user);

        $user = Auth::guard('customer')->user();

        $token = $user->createToken('customer_token')->plainTextToken;

        return $this->sendCustomResponse([
            'success' => true,
            'data' => new CustomerResource($user),
            'token' => $token,
            'message' => 'Success',
        ]);

    }

    public function verifyOTP(Request $request)
    {
        $request->validate([
            'customer_id'=>'required|exists:customers,id',
            'otp'=>'required',
        ]);

        $user = Customer::where('id',$request->customer_id)->first();

        $verificationCode = $user->verificationCode;

        if ($verificationCode && $verificationCode->otp === $request->otp) {
            $user->verificationCode->delete();
            return $this->sendSuccessResponse(new CustomerResource($user));
        }
        
        return $this->sendErrorResponse('Invalid OTP');
    }
    
    public function resendOTP(Request $request)
    {
        $request->validate([
            'customer_id'=>'required|exists:customers,id',
        ]);

        $user = Customer::findOrFail($request->customer_id);

        try {
            $info = $user->verificationCode()->updateOrCreate(
                ['phone' => $user->phone],
                [
                    'phone' => $user->phone,
                    'otp' => rand(123456, 999999),
                    'expired_at' => Carbon::now()->addMinutes(5)
                ]
            );

            $message = 'Your new verification code is '. $info->otp;
            Twilio::message($user->phone, $message);

        } catch(Throwable $th) {
            return $this->sendErrorResponse('OTP resent failed. ' .$th->getMessage());
        }
         
        return $this->sendSuccessResponse('OTP resent successfully.');
    }
}
