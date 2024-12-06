<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StudentLoginController extends Controller
{
    // Function to handle login
    public function login(Request $request)
{
    // Validate the form input
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Find the user by email
    $user = User::where('email', $request->email)->first();

    // Check if the user exists and the password matches
    if ($user && Hash::check($request->password, $user->user_password)) {
        Auth::login($user); // Log the user in
        return redirect()->intended('/student_dashboard');
    } else {
        return back()->withErrors(['email' => 'Invalid credentials, please try again.']);
    }
}




    public function logout(Request $request)
{
    Auth::logout(); // Log out the user
    return redirect('/'); // Redirect to the home page or login page
}

public function updatePassword(Request $request, $id)
{
    // Validate the incoming request data
    $request->validate([
        'password' => 'required|string|min:8', // Ensure to set your password validation rules
    ]);

    // Find the user by ID
    $user = User::findOrFail($id);

    // Update the user's password (ensure to hash it)
    $user->user_password = Hash::make($request->password);
    $user->save();

    // Return a response
    return response()->json(['message' => 'Password updated successfully!']);
}

public function storeUser(Request $request)
{
    // Validate the input fields
    $validatedData = $request->validate([
        'id' => 'required|digits:7|unique:system_users,id',
        'email' => 'required|email|unique:system_users,email',
        'user_password' => 'required|min:8',
        'user_name' => 'required|string|max:255',
        'program' => 'nullable|string|max:100',
        'year_of_study' => 'required|in:freshman,sophomore,junior,senior',
        'user_role' => 'required|in:student,admin,registrar,department',
    ]);

    // Hash the password before storing it
    $validatedData['user_password'] = bcrypt($validatedData['user_password']);

    // Create a new user using the User model
    $user = new \App\Models\User($validatedData);

    // Save the user to the database
    $user->save();

    // Return a response
    return redirect()->back()->with('success', 'User has been successfully added.');
}


}


