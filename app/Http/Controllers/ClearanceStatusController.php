<?php

namespace App\Http\Controllers;

use App\Models\ClearanceStatus;
use Illuminate\Http\Request;

class ClearanceStatusController extends Controller
{
    public function updateStatus(Request $request, $student_id)
    {
        $request->validate([
            'department_status' => 'required|in:Pending,Cleared',
            'registrar_status' => 'required|in:Pending,Cleared',
            'overall_status' => 'required|in:Pending,Completed',
        ]);

        $clearanceStatus = ClearanceStatus::updateOrCreate(
            ['student_id' => $student_id],
            [
                'department_status' => $request->department_status,
                'registrar_status' => $request->registrar_status,
                'overall_status' => $request->overall_status,
            ]
        );

        return response()->json($clearanceStatus);
    }
}
