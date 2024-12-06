<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\ClearanceRequestStat;

class StudentDashboardController extends Controller
{
    public function studentDashboard()
{
    $student = Auth::user(); // Get the currently authenticated student

    // Assuming the User model has 'department' and 'program' relationships
    $department = $student->department->department_name ?? 'N/A';
    $program = $student->program->program_name ?? 'N/A';

    // Check if the student has an active (Pending or No Action) clearance request
    $existingRequest = ClearanceRequestStat::where('student_id', $student->id)
        ->whereIn('status', ['Pending', 'No Action', 'No Action']) // Use whereIn for multiple status conditions
        ->first();

    // Extract clearance_id if an existing request is found
    $clearance_id = $existingRequest ? $existingRequest->clearance_id : null;
    $clearanceStatus = $existingRequest ? $existingRequest->status : null; // Get the status

    

    // Pass the student, department, program, clearanceId, and existing request data to the view
    return view('student_dashboard', [
        'student' => $student,
        'department' => $department,
        'program' => $program,
        'existingRequest' => $existingRequest,
        'clearance_id' => $clearance_id, // Pass the clearance_id to the view
        'clearanceStatus' => $clearanceStatus,
    ]);
}

public function getStatus($id)
{
    $clearance = ClearanceRequestStat::where('clearance_id', $id)->first();
    if ($clearance) {
        return response()->json([
            //'registrar_status' => $clearance->status,
            'department_status' => $clearance->status,
        ]);
    }

    return response()->json(['error' => 'Clearance not found'], 404);
}


    

}
