<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\AppcartUser;

use Auth;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // dd($credentials);

        if (Auth::attempt($credentials)) {
            return redirect()->route('users.index');
        }else{
            return redirect()->route('login')->with('error', 'Invalid credentials');
        }

        // $user = AppcartUser::where('email', $credentials['email'])->first();

        // if ($user && Hash::check($credentials['password'], $user->password)) {
        //     Auth::login($user);
        //     return redirect()->route('users.index');
        // } else {
        //     return redirect()->route('users.login')->with('error', 'Invalid credentials');
        // }

    }
}
