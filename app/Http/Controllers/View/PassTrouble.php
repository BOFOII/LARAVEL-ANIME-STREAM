<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PassTrouble extends Controller
{
    public function forgotPassword() {
        return view('user.pass-trouble.forgot-password');
    }

    public function resetPassword(string $token) {
        return view('user.pass-trouble.reset-password', ['token' => $token]);
    }
}
