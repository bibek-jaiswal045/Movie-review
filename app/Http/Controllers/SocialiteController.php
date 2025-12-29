<?php

namespace App\Http\Controllers;

use App\Models\Socialite as ModelsSocialite;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SocialiteController extends Controller
{

    public function redirectHandler($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function callbackHandler($driver)
    {
        try {
            $user = Socialite::driver($driver)->user();
        } catch (\Exception $e) {
            return redirect()->route('login');
        }

        $user_exists = User::where('email', $user->getEmail())->where('provider_id', $user->getId())->first();

        if ($user_exists) {
            Auth::login($user_exists);
        } else {

            $new_user = new User;

            $new_user = User::create([
                'provider_id' => $user->getId(),
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'provider_name' => $driver,
                'password' => Hash::make(Str::random(10)),

            ]);

            ModelsSocialite::create([
                'user_id' => $new_user->id,
                'provider_id' => $new_user->provider_id,
                'provider_name' => $driver,
            ]);

            Auth::login($new_user);
        }

        return redirect()->route('clientindex');
    }
}
