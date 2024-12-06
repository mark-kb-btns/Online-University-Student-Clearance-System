<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\ClearanceRequestStat;

class ClearanceAdminDashboardController extends Controller
{
    
    public function index()
    {
        $numAdmins = User::where('user_role', 'admin')->count();
        $numRegistrars = User::where('user_role', 'registrar')->count();
        $numDepartments = User::where('user_role', 'department')->count();
        $numStudents = User::where('user_role', 'student')->count();
        $totalApprovedRequests = ClearanceRequestStat::where('status', 'Completed')->count();
    
        // Get the latest 10 registered students
        $recentStudents = User::where('user_role', 'student')
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();
    
        return view('clearance_admin_dashboard', [
            'numAdmins' => $numAdmins,
            'numRegistrars' => $numRegistrars,
            'numDepartments' => $numDepartments,
            'numStudents' => $numStudents,
            'totalApprovedRequests' => $totalApprovedRequests,
            'recentStudents' => $recentStudents, // Pass recent students
        ]);
    }
    

    public function update(Request $request, $id)
{
    $student = User::findOrFail($id);

    // Validate the data
    $request->validate([
        'user_name' => 'required|string|max:255',
    ]);
    
    try {
        // Update the student information (excluding 'id' as it shouldn't change)
        $student->update([
            'user_name' => $request->user_name,
            // 'id' should not be updated, assuming it’s fixed and auto-incremented
        ]);

        // Redirect with success message
        return redirect()->route('clearance_admin_dashboard', ['id' => $student->id])->with('success', 'Profile updated successfully.');

    } catch (\Exception $e) {
        // If there was an error, redirect with error message
        return redirect()->route('clearance_admin_dashboard', ['id' => $student->id])->with('error', 'Profile update failed. Please try again.');
    }
}


public function gettable() {
    $students = User::where('user_role', 'student')
        ->with(['department', 'program'])
        ->take(20)
        ->get();
    
        foreach ($students as $student) {
            $departmentName = $student->department->department_name ?? 'N/A'; // Handle null case
            $programName = $student->program->program_name ?? 'N/A';
        }
        
    return view('clearance_admin_manager', compact('students'));

}

public function register(Request $request) {
    $validated = $request->validate([
        'user_name' => 'required|string',
        'id' => 'required|unique:system_users,id',
        'email' => 'required|string',
        'user_password' => 'required|min:8',
        'program_id' => 'required|int',
        'department_id' => 'required|int',
        'year_level' => 'required|string',
    ]);

    try {
        User::create([
            'user_name' => $validated['user_name'],
            'id' => $validated['id'],
            'email' => $validated['email'],
            'user_password' => bcrypt($validated['user_password']),  // Assuming you use 'password' as column name
            'program_id' => $validated['program_id'],
            'department_id' => $validated['department_id'],
            'year_level' => $validated['year_level'],
            'student_status' => 'Active',
            'user_role' => 'student',
        ]);


        return redirect()->route('clearance.admin.manager')->with('success', 'User registered successfully');
    } catch (\Exception $e) {
        return back()->with('error', 'Failed to register user: ' . $e->getMessage());
    }
}



    


}
