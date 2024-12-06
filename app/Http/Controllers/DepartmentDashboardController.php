<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Request;
use App\Models\ClearanceRequestStat; // Add this line

class DepartmentDashboardController extends Controller
{
    

    public function departmentstats()
    {
        // Get the currently authenticated user
        $user = Auth::user();
        
        // Get totals from your models
        $totalStudents = User::where('user_role', 'student')->count();
        $totalRequests = ClearanceRequestStat::count(); // Fetch total requests
        $totalApprovedRequests = ClearanceRequestStat::where('status', 'Completed')->count(); // Fetch total approved requests
        $clearances = ClearanceRequestStat::with(['student.department', 'student.program'])
        ->whereIn('status', ['Pending', 'On Hold'])
        ->paginate(10);



        foreach ($clearances as $student) {
            $departmentName = $student->department->department_name ?? 'N/A'; // Handle null case
            $programName = $student->program->program_name ?? 'N/A';
        }

        
        //dd($totalStudents, $totalRequests, $totalApprovedRequests);
        //\Log::info("Total Students: {$totalStudents}, Total Requests: {$totalRequests}, Approved Requests: {$totalApprovedRequests}");

        // Optionally, you can fetch the statuses as well
        //$totalPendingStatus = ClearanceStatus::where('overall_status', 'Pending')->count();

        // Return the view with these variables
        return view('department_dashboard', [
            'totalStudents' => $totalStudents,
            'totalRequests' => $totalRequests,
            'totalApprovedRequests' => $totalApprovedRequests,
            'clearances' => $clearances
            //'totalPendingStatus' => $totalPendingStatus, // Include if you need it
        ]);
    }

    public function index()
    {
        $clearances = ClearanceRequestStat::with('student')->get();

        return view('department_dashboard', compact('clearances'));
    }

    public function approve($id)
    {
        $clearance = ClearanceRequest::findOrFail($id);
        $clearance->status = 'Approved';
        $clearance->save();

        return redirect()->back()->with('success', 'Clearance approved successfully.');
    }

    public function hold(Request $request, $id)
    {
        $clearance = DepartmentClearanceRequest::findOrFail($id);
        $clearance->status = 'On Hold';
        $clearance->hold_reason = $request->input('hold_reason');
        $clearance->save();

        return redirect()->back()->with('success', 'Clearance put on hold.');
    }

    public function download($id)
    {
        $clearance = Clearance::findOrFail($id);

        // Example: Adjust this based on your storage setup
        return response()->download(storage_path("app/{$clearance->attachments}"));
    }


}
