<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\ClearanceRequests;

class StudentDashboardController extends Controller
{
    public function studentDashboard()
    {
        $student = Auth::user();  // Get the currently authenticated student
    
        // Assuming the User model has 'department' and 'program' relationships
        $department = $student->department->department_name; 
        $program = $student->program->program_name;

        // Check if the student has an active (Pending) clearance request
        $existingRequest = ClearanceRequests::where('student_id', $student->id)
            ->where('status', 'Pending')
            ->first();
    
        // Pass the student, department, program, and existing request data to the view
        return view('student_dashboard', [
            'student' => $student,
            'department' => $department,
            'program' => $program,
            'existingRequest' => $existingRequest // Pass the variable to the view
        ]);
    }
}
