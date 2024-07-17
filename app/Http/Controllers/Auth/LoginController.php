<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('pages.login');
    }

    public function showSettings()
    {
        return view('pages.settings');
    }

    public function sessionView() //get current session details
    {
        $user = Auth::user();
         // Ensure the user is authenticated
         if (Auth::check()) {
            $user = Auth::user();
            return view('pages.settings', compact('user'));
        } else {
            return redirect()->route('login')->with('error', 'You need to login first.');
        }
    }

    public function updateSession(Request $request) //update info
    {
        // Ensure the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();

            // Validate the request
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            ]);

            // Update the user's information
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->save();

            // Update the session
            Auth::setUser($user); // Update the Auth user instance
            Session::put('user', $user); // Update the session with the new user data

            return redirect()->route('settings')->with('success', 'Profile updated successfully.');
        } else {
            return redirect()->route('login')->with('error', 'You need to login first.');
        }
    }

    public function sessionData()
    {
        $user = Auth::user();
        return response()->json($user);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            // Retrieve authenticated user
            $user = Auth::user();

            // Store user data in session
            $request->session()->put('user', $user);

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
