<?php

namespace App\Http\Controllers;

use App\Models\ClearanceRequest;
use Illuminate\Http\Request;

class ClearanceRequestController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:system_users,id',
            'request_date' => 'required|date',
            'purpose' => 'required|string|max:255',
        ]);

        $clearanceRequest = ClearanceRequest::create([
            'student_id' => $request->student_id,
            'request_date' => $request->request_date,
            'purpose' => $request->purpose,
        ]);

        return response()->json($clearanceRequest, 201);
    }

    public function show($id)
    {
        $clearanceRequest = ClearanceRequest::findOrFail($id);
        return response()->json($clearanceRequest);
    }

    public function uploadClearanceFile(Request $request)
{
    $request->validate([
        'clearance_id' => 'required|exists:clearance_requests,clearance_id',
        'student_id' => 'required|exists:system_users,id',
        'file' => 'required|file|mimes:pdf,jpeg,png|max:2048',
    ]);

    $file = $request->file('file');
    $fileName = time() . '_' . $file->getClientOriginalName();
    $filePath = $file->storeAs('uploads/clearance_files', $fileName, 'public');

    // Save file information in the database
    DB::table('clearance_files')->insert([
        'clearance_id' => $request->clearance_id,
        'student_id' => $request->student_id,
        'file_name' => $fileName,
        'file_path' => $filePath,
    ]);

    return response()->json(['success' => true, 'message' => 'File uploaded successfully']);
}

}
