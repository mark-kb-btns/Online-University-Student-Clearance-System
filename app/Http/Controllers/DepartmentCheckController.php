<?php

namespace App\Http\Controllers;

use App\Models\DepartmentCheck;
use Illuminate\Http\Request;

class DepartmentCheckController extends Controller
{
    public function store(Request $request, $clearance_id)
    {
        $request->validate([
            'department_id' => 'required|exists:departments,department_id',
            'check_name' => 'required|string|max:255',
            'clearance_status' => 'required|in:No Action,Pending,On Hold,Cleared',
            'checked_by' => 'nullable|string|max:255',
        ]);

        $departmentCheck = DepartmentChecks::create([
            'clearance_id' => $clearance_id,
            'department_id' => $request->department_id,
            'check_name' => $request->check_name,
            'clearance_status' => $request->clearance_status,
            'checked_by' => $request->checked_by,
            'check_date' => now(),
        ]);

        return response()->json($departmentCheck, 201);
    }

    public function updateStatus(Request $request, $check_id)
    {
        $departmentCheck = DepartmentChecks::findOrFail($check_id);
        $departmentCheck->update([
            'clearance_status' => $request->clearance_status,
        ]);

        // Logic to pass to registrar if cleared
        if ($departmentCheck->clearance_status === 'Cleared') {
            // Pass to Registrar
            // Trigger registrar check...
        }

        return response()->json($departmentCheck);
    }
}
