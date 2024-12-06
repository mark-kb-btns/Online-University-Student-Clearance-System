<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ClearanceRequestStat;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\ClearanceFiles;



class ClearanceController extends Controller
{
    // Method to create or set the clearance request purpose
    public function createClearanceRequest(Request $request)
{
    // Validate the request input
    $request->validate([
        'purpose' => 'required|string'
    ]);

    // Get the currently authenticated student
    $student = Auth::user();

    // Check if the student already has a pending clearance request
    $existingRequest = ClearanceRequestStat::where('student_id', $student->id)
    ->whereIn('status', ['Pending', 'No Action', 'On Hold'])
    ->first();

    if ($existingRequest) {
        // If a pending request exists, redirect back with an error and clearance_id
        return redirect()->back()
            ->withErrors('You already have a pending clearance request.')
            ->with('clearance_id', $existingRequest->id); // Add clearance_id to the session
    }


    // Create a new clearance request
    $clearanceRequest = new ClearanceRequestStat();
    $clearanceRequest->student_id = $student->id;
    $clearanceRequest->request_date = now(); // Current date
    $clearanceRequest->status = 'No Action';   // Default status
    $clearanceRequest->purpose = $request->input('purpose');
    $clearanceRequest->save();

    // Get the newly created clearance request
    $clearance = $clearanceRequest;

    // Return the student dashboard view with the clearance data
    return redirect()->route('student_dashboard')->with('success', 'Clearance request has been created.')->with(compact('clearance'));
}


public function uploadClearanceFile(Request $request)

{
    Log::info('Uploading clearance file...');
    // Log the incoming clearance_id to verify it's correct
    Log::info('Clearance ID from request:', ['clearance_id' => $request->clearance_id]);

    // Try fetching the clearance request from the database
    $clearanceRequest = ClearanceRequestStat::where('clearance_id', $request->clearance_id)->first();

    // Log the result of the query
    Log::info('Clearance Request:', ['clearanceRequest' => $clearanceRequest]);

    // Check if clearance request was found
    Log::info('Clearance Request:', ['clearanceRequest' => $clearanceRequest]);
if (!$clearanceRequest) {
    Log::error('Clearance Request not found', ['clearance_id' => $request->clearance_id]);
    return response()->json(['success' => false, 'message' => 'Clearance request not found'], 404);
}


    // Check if the clearance status is 'On Hold' or 'No Action'
    /*if (!in_array($clearanceRequest->status, ['On Hold', 'No Action'])) {
        return response()->json(['success' => false, 'message' => 'You cannot upload the file unless the status is "On Hold" or "No Action"'], 400);
    }*/

    // Validate input
    $validator = Validator::make($request->all(), [
        'clearance_id' => 'required|exists:clearance_requests,clearance_id',
        'student_id' => 'required|exists:system_users,id',
        'department_file' => 'required|file|mimes:pdf,jpeg,png|max:2048',
    ]);
    
    if ($validator->fails()) {
        Log::error('Validation failed:', $validator->errors()->toArray());
        return response()->json(['success' => false, 'message' => 'Validation failed', 'errors' => $validator->errors()], 422);
    }
    

    Log::info($request->all());

    // Check if file already exists (if applicable)
    $existingFile = ClearanceFiles::where('clearance_id', $request->clearance_id)->first();
    if ($existingFile) {
        return response()->json(['success' => false, 'message' => 'You have already uploaded a file.'], 400);
    }

    // Handle file upload
    
    $file = $request->file('department_file');
    Log::info('File data:', ['file' => $request->file('department_file')]);

    $fileName = time() . '_' . $file->getClientOriginalName();
    $filePath = $file->storeAs('uploads/clearance_files', $fileName, 'public');

    // Save file information in the database
    ClearanceFiles::insert([
        'clearance_id' => $request->clearance_id,
        'student_id' => $request->student_id,
        'file_name' => $fileName,
        'file_path' => $filePath,
    ]);

    Log::info('File insert data:', [
        'clearance_id' => $request->clearance_id,
        'student_id' => $request->student_id,
        'file_name' => $fileName,
        'file_path' => $filePath
    ]);

    // Update the clearance status to 'Pending'
    ClearanceRequestStat::where('clearance_id', $request->clearance_id)
        ->update(['status' => 'Pending']);

    return response()->json(['success' => true, 'message' => 'File uploaded successfully']);
}


public function getClearanceFiles($clearanceId)
{
    $files = DB::table('clearance_files')
        ->where('clearance_id', $clearanceId)
        ->get();

    return response()->json($files);
}


}
