<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ClearanceRequests;

class ClearanceController extends Controller
{
    // Method to create or set the clearance request purpose
    public function createClearanceRequest(Request $request)
{
    // Validate the request input
    $request->validate([
        'purpose' => 'required|string'
    ]);

    // Get the currently authenticated student
    $student = Auth::user();

    // Check if the student already has a pending clearance request
    $existingRequest = ClearanceRequests::where('student_id', $student->id)
        ->where('status', 'Pending')
        ->first();

    if ($existingRequest) {
        // If a pending request exists, return an error
        return redirect()->back()->withErrors('You already have a pending clearance request.');
    }

    // Create a new clearance request
    $clearanceRequest = new ClearanceRequests();
    $clearanceRequest->student_id = $student->id;
    $clearanceRequest->request_date = now(); // Current date
    $clearanceRequest->status = 'Pending';   // Default status
    $clearanceRequest->purpose = $request->input('purpose');
    $clearanceRequest->save();

    // Redirect with a success message
    return redirect()->route('student_dashboard')->with('success', 'Clearance request has been created.');
}

}
