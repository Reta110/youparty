<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SocialAccountService;
use Socialite;

class SocialAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback(SocialAccountService $service)
    {
        $user = Socialite::driver('facebook')->stateless()->user();
        $user = $service->createOrGetUser($user);

        auth()->login($user);

        return redirect()->intended('/channels');
    }
}