<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DepartmentLoginController extends Controller
{
    // Function to handle departmental staff login
    public function login(Request $request)
    {
        // Validate the form input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Find the user by email
        $user = User::where('email', $request->email)
                     ->where('user_role', 'department') // Ensure the user is a departmental staff
                     ->first();

        // Check if the user exists and the password matches
        if ($user && Hash::check($request->password, $user->user_password)) {
            Auth::login($user); // Log the user in
            \Log::info('Department staff logged in: ' . $request->email);
            return redirect()->intended('/department_dashboard'); // Redirect to the department dashboard
            
        } else {
            \Log::info('Failed login attempt for department staff: ' . $request->email);
            return back()->withErrors(['email' => 'Invalid credentials, please try again.']);
        }
    }
}