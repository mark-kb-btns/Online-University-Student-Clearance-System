<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ClearanceAdminLoginController extends Controller
{
    // Function to handle clearance admin login
    public function clearanceadmin_login(Request $request)
    {
        // Validate the form input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Find the user by email
        $user = User::where('email', $request->email)
                     ->where('user_role', 'admin') // Ensure the user is a clearance admin
                     ->first();

        // Check if the user exists and the password matches
        if ($user && Hash::check($request->password, $user->user_password)) {
            Auth::login($user); // Log the user in
            \Log::info('Clearance Admin logged in: ' . $request->email);
            return redirect()->intended('/clearance_admin_dashboard'); // Redirect to the clearance admin dashboard
            
        } else {
            \Log::info('Failed login attempt for Clearance Admin: ' . $request->email);
            return back()->withErrors(['email' => 'Invalid credentials, please try again.']);
        }
    }
}