<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    // Signup functionality
    public function signup(Request $request)
    {
        // Validate input data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        // Redirect to the dashboard or wherever after successful signup
        return redirect('/login')->with('success', 'Signup successful! Please login.');


        // Redirect to the dashboard or wherever after successful signup
        // return redirect('/dashboard')->with('success', 'Signup successful! Welcome to the library.');
    }

    // Login functionality
    public function login(Request $request)
    {
        // Validate input data
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        // Attempt to log in the user
        if (Auth::attempt($request->only('email', 'password'))) {
            // If successful, redirect to dashboard
            return redirect('/dashboard')->with('success', 'Login successful!');
        }

        // If login fails, redirect back with error message
        return back()->withErrors([
            'email' => 'Invalid password.',
        ]);
    }

    // Logout functionality
    public function logout(Request $request)
    {
        Auth::logout();
        session()->flash('success','Logged out Successfully');

        // Invalidate the session

        // Redirect to the login page
        return redirect('/login');
    }
}
