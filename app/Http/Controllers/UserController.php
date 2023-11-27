<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //
    public function create() {
        return view('register');
    }

    public function login() {
        return view('login');
    }

    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You logged out?');
    }

    public function store(Request $request) {
        $form = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);
        //hash password
        $form['role'] = 'user';
        $form['password'] = bcrypt($form['password']);
        
        $user = User::create($form);
        $user->profile_pic = "default_profile.png";
        $user->save();
        auth()->login($user);
        return redirect('/')->with('message', 'Created and logged in successfully');
    }

    public function authenticate(Request $request) {
        $form = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
    
        // Retrieve the user by email (replace 'User' with your actual User model)
        $user = User::where('email', $form['email'])->first();
    
        // Check if the user exists and the password matches (plaintext)
        if ($user && $user->password === $form['password']) {
            // Authentication successful
            $request->session()->regenerate();
            return redirect('/admin/dashboard')->with('message', 'You are now logged in!');
        } else {
            // Authentication failed
            return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
        }
    }


}
