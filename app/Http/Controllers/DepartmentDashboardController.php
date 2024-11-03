<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Request;
use App\Models\ClearanceRequestStat; // Add this line

class DepartmentDashboardController extends Controller
{
    public function departmentDashboard()
    {
        // Get the currently authenticated user
        $user = Auth::user();  // Assuming 'Auth' is used for authentication
        
        // Pass the user data to the view
        return view('department_dashboard', ['user' => $user]);
    }

    

    public function departmentstats()
    {
        // Get the currently authenticated user
        $user = Auth::user();
        
        // Get totals from your models
        $totalStudents = User::where('user_role', 'student')->count();
        $totalRequests = ClearanceRequestStat::count(); // Fetch total requests
        $totalApprovedRequests = ClearanceRequestStat::where('status', 'Completed')->count(); // Fetch total approved requests
        
        //dd($totalStudents, $totalRequests, $totalApprovedRequests);
        //\Log::info("Total Students: {$totalStudents}, Total Requests: {$totalRequests}, Approved Requests: {$totalApprovedRequests}");

        // Optionally, you can fetch the statuses as well
        //$totalPendingStatus = ClearanceStatus::where('overall_status', 'Pending')->count();

        // Return the view with these variables
        return view('department_dashboard', [
            'totalStudents' => $totalStudents,
            'totalRequests' => $totalRequests,
            'totalApprovedRequests' => $totalApprovedRequests,
            //'totalPendingStatus' => $totalPendingStatus, // Include if you need it
        ]);
    }

}
