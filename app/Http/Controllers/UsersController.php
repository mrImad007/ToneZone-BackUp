<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function create() {
        return view('users.register');
    }

    // store register data
    public function store(Request $request) {

        $formField = $request->validate([
            'name' => ['required', 'min:4'],
            'email' => ['required', 'email' , Rule::unique('Users', 'email')],
            'password' => ['required', 'min:6'],
            'age' => 'required',
        ]);
        // hash password
        $formField['password'] = bcrypt($formField['password']);
        // create user 
        $user = User::create($formField);
        // login
        auth()->login($user);
        return redirect('/')->with('message', 'Registed and logged in, Welcome '.auth()->user()->name);
    }

    // show login form
    public function login() {
        return view('users.login');
    }

    public function authentification(Request $request) {
        $formField = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6']
        ]);
        if (auth()->attempt($formField)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('message', 'Hello ' . auth()->user()->name);
        }
        return back()->withErrors(['email' => 'User not found, try again'])->onlyInput('email');
    }

    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


}
