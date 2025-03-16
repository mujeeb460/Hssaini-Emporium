<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Mail;





class UserController extends Controller
{
    public function myorder()
    {
        if (!Auth::user()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $orders = Order::with('orderDetails')->where('user_id', auth()->id())->get();
        return view('frontend.myorder', compact('orders','user'));
    }


    public function forgot_password()
    {
    	return view('frontend.forgot_password');
    }


    public function check_forgot(Request $request)
    {
    
    $email = $request->email;
    
    $check = User::where('email', $email)->exists();
    
    if($check)
    {
        $password_make = Str::random(8);
        $password = Hash::make($password_make);
        
        $user = User::where('email', $email)->first();
        
        if($user)
        {
        	$update = User::where('email', $email)
            ->update([
                'password'=> $password
            ]);
       
        
        Mail::raw('Your new password '. $password_make, function ($message) use ($email) { 
            $message->to($email)
                    ->subject('Forgot Password')
                    ->from('info@hussainiemporium.com', 'Hussaini Emporium');
        });
            
            return redirect()->back()->with(['success'=>"Please check your email"]);
            
        }
        
    }else{
        
        return redirect()->back()->with(['failed'=>"Please enter valid email"]);
        
    }


    }


}
