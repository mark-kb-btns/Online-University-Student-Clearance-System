<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\AuditLog;

class ClearanceAdminAuditController extends Controller {

    public function registerStudent(Request $request)
    {
        // Example student registration logic
        $student = Student::create($request->all());

        // Log the action
        AuditLog::create([
            'action' => 'Registered a student',
            'performed_by' => Auth::user()->id, // Assumes admin is authenticated
            'user_name' => Auth::user()->user_name,
            'ip_address' => $request->ip(),
            'details' => [
                'student_name' => $student->name,
                'student_id' => $student->id,
            ],
        ]);

        return redirect()->back()->with('success', 'Student registered successfully.');
    }

    public function index()
    {
        $logs = AuditLog::latest()->paginate(10); // Paginate logs
        return view('audit_logs.index', compact('logs'));
    }

    public function filter(Request $request)
{
    $query = AuditLog::query();

    // Filters
    if ($request->has('action')) {
        $query->where('action', $request->input('action'));
    }
    if ($request->has('user')) {
        $query->whereHas('user', function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->input('user') . '%');
        });
    }
    if ($request->has('date_from') && $request->has('date_to')) {
        $query->whereBetween('created_at', [$request->input('date_from'), $request->input('date_to')]);
    }

    $logs = $query->paginate(10);

    return view('clearance_admin_audit', compact('logs'));
}

    public function rollback($logId)
    {
        $log = AuditLog::findOrFail($logId);

        if ($log->action === 'update') {
            DB::table($log->table_name)
                ->where('id', $log->record_id)
                ->update(json_decode($log->previous_data, true));
        }

        // Handle other rollback types like delete, create, etc.
        return back()->with('success', 'Action rolled back successfully.');
    }

        public function analytics()
    {
        $actionCounts = AuditLog::select('action', DB::raw('count(*) as count'))
            ->groupBy('action')
            ->get();

        $actionsOverTime = AuditLog::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        return view('clearance_admin_audit', compact('actionCounts', 'actionsOverTime'));
    }




}