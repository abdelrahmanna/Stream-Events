<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    /**
     * Redirect to third party authentication
     * 
     * @param string $provider
     * @return RedirectResponse
     */
    public function redirect($provider): RedirectResponse
    {
        // redirect to third party authentication
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Handle callback from third party authentication
     * 
     * @param string $provider
     * @return RedirectResponse
     */
    public function callback($provider): RedirectResponse
    {
        $user = Socialite::driver($provider)->stateless()->user();


        // update or create user in the database
        $user = User::updateOrCreate(["email" => $user->email], [
            "name" => $user->name,
            "email" => $user->email,
            "password" => bcrypt($user->token),
            "refresh_token" => $user->refreshToken
        ]);


        // login the user
        Auth::login($user);

        // create access token for the user using sanctum
        $token = $user->createToken($user->email)->plainTextToken;

        // redirect to dashboard with cookie containing the token
        return redirect(route("dashboard"), 302)
            ->withCookie(cookie("access_token_".$user->id, $token, 60 * 24 * 7));
    }
}
