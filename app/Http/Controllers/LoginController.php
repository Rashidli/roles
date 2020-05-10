<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $this->validate(request(), [
            'email'    => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt([
            'email'    => $request->email,
            'password' => $request->password
        ])) {
            return redirect()->route('admin');
        }
        return redirect()->route('admin.login')->withErrors('email or password incorrect');
    }
}
