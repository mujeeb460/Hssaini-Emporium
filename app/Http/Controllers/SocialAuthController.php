<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleFacebookCallback()
    {

        try {

            $user = Socialite::driver('facebook')->stateless()->user();
            $finduser = User::where('facebook_id', $user->id)->first();
            if($finduser){

                Auth::login($finduser);
                return redirect()->intended('dashboard');

            }else{

                $newUser = User::updateOrCreate(['email' => $user->email],[
                        'first_name' => $user->name,
                        'facebook_id'=> $user->id,
                        'password' => encrypt('123456dummy')
                    ]);

                Auth::login($newUser);

                return redirect()->intended('dashboard');

            }

       

        } catch (Exception $e) {

            dd($e->getMessage());

        }

    }

    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->stateless()->user();

            $finduser = User::where('google_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect()->intended('dashboard');

            }else{

                $newUser = User::updateOrCreate(['email' => $user->email],[
                        'first_name' => $user->name,
                        'google_id'=> $user->id,
                        'password' => encrypt('123456dummy')
                    ]);

                Auth::login($newUser);

                return redirect()->intended('dashboard');

            }

        } catch (Exception $e) {

            dd($e->getMessage());

        }

    }

    public function handleProviderCallback($provider)
    {
        $socialUser = Socialite::driver($provider)->stateless()->user();

        // Check if the user already exists
        $user = User::where('email', $socialUser->getEmail())->first();

        if (!$user) {
            // Create a new user if not already registered
            $user = User::create([
                'name' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
                'provider' => $provider,
                'provider_id' => $socialUser->getId(),
                'password' => bcrypt(uniqid()), // Generate a random password
            ]);
        }

        // Log the user in
        Auth::login($user);

        return redirect()->intended('/dashboard'); // Redirect to desired location
    }
}
