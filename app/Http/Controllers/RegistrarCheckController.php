<?php

namespace App\Http\Controllers;

use App\Models\RegistrarCheck;
use Illuminate\Http\Request;

class RegistrarCheckController extends Controller
{
    public function store(Request $request, $clearance_id)
    {
        $request->validate([
            'check_name' => 'required|string|max:255',
            'clearance_status' => 'required|in:Pending,Cleared',
            'checked_by' => 'nullable|string|max:255',
            'remarks' => 'required|string|max:255',
        ]);

        $registrarCheck = RegistrarChecks::create([
            'clearance_id' => $clearance_id,
            'check_name' => $request->check_name,
            'clearance_status' => $request->clearance_status,
            'checked_by' => $request->checked_by,
            'remarks' => $request->remarks,
            'check_date' => now(),
        ]);

        return response()->json($registrarCheck, 201);
    }
}
