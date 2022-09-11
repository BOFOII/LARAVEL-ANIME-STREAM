<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResetPassRequest;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credential = [
            'email' => $request->validated('email'),
            'password' => $request->validated('password')
        ];
        if (Auth::attempt($credential, $request->has('remember_me') ? true : false)) {
            $request->session()->regenerate();
            return redirect()->intended(route('view.home'));
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function loginRedirect(string $driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function authWith(string $driver)
    {
        $accountId = Socialite::driver($driver)->user()->id;

        $user = User::where("{$driver}_id", $accountId)->first();
        if($user) {
            Auth::login($user);
            return redirect()->intended(route('view.home'));
        }
        $newuser = User::create([
            'name' => $accountId,
            'email' => "{$accountId}@gmail.com",
            'password' => Hash::make($accountId),
            'agree_privacy_policy' => true,
            "{$driver}_id" => $accountId,
        ]);
        Auth::login($newuser);
        return redirect()->intended(route('view.home'));
    }

    public function register(RegisterRequest $request)
    {
        User::create($request->validated());
        return back()->with("success");
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('view.home'));
    }

    public function forgotPassword(Request $request) {
        $request->validate(['email' => ['required', 'email']]);
        $status = Password::sendResetLink($request->only('email'));
        return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
    }

    public function resetPassword(ResetPassRequest $request) {
        $status = Password::reset($request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user) use($request) {
            $user->forceFill([
                'password' => $request->validated('password')
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        });
        return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
    }
}
