<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirect(string $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function callback(string $provider)
    {
        try {

            $user = Socialite::driver($provider)->user();

            $findModel = [
                'email' => $user->email,
                'provider_google_id' => $user->id,
            ];

            $user = User::firstOrCreate($findModel, [
                'name' => $user->name,
                'provider_name'=> $provider,
            ]);

            Auth::login($user);

            return redirect('/dashboard');
        } catch (Exception $e) {
            error_log($e->getMessage());
            return response()->json([
                'message' => ucfirst($provider). " sign in failed",
            ], 400);
        }
    }
}
