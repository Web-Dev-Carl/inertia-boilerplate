<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Socials;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function callback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            // Handle the error, log the exception, and redirect appropriately
            return redirect()->route('login')->with('error', 'Unable to login using ' . ucfirst($provider) . '. Please try again.');
        }

        // Check if user exists
        $user = User::where('email', $socialUser->getEmail())->first();
        $name = $socialUser->getNickname() ?? $socialUser->getName();

        if (!$user) {
            // Create the user if they don't exist
            $user = User::create([
                'name' => $name,
                'email' => $socialUser->getEmail(),
                'password' => bcrypt(Str::random(24)), // It's good to hash passwords even if they won't be used
            ]);

            // Create social login profile for the user
            $user->socials()->create([
                'provider_id' => $socialUser->getId(),
                'provider' => $provider,
                'provider_token' => $socialUser->token,
                'provider_refresh_token' => $socialUser->refreshToken ?? null,
            ]);
        } else {
            // Ensure social profile is linked if the user exists but not linked
            $socialProfile = $user->socials()->where('provider', $provider)->first();
            if (!$socialProfile) {
                $user->socials()->create([
                    'provider_id' => $socialUser->getId(),
                    'provider' => $provider,
                    'provider_token' => $socialUser->token,
                    'provider_refresh_token' => $socialUser->refreshToken ?? null,
                ]);
            }
        }

        // Log the user in
        Auth::login($user, true);

        // Redirect to the intended URL or a default one
        return redirect()->intended('/');
    }

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
}
