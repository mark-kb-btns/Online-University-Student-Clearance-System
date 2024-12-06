<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClearanceRequest extends Model
{
    use HasFactory;

    protected $primaryKey = 'clearance_id';

    public function departmentChecks()
    {
        return $this->hasMany(DepartmentChecks::class, 'clearance_id');
    }

    public function registrarChecks()
    {
        return $this->hasMany(RegistrarChecks::class, 'clearance_id');
    }

    public function clearanceStatus()
    {
        return $this->hasOne(ClearanceStatus::class, 'student_id');
    }

    public function approve($id)
{
    $clearance = ClearanceRequest::findOrFail($id);
    $clearance->status = 'Approved';
    $clearance->save();

    return redirect()->back()->with('success', 'Clearance approved successfully');
}

public function hold(Request $request, $id)
{
    $clearance = ClearanceRequest::findOrFail($id);
    $clearance->status = 'On Hold';
    $clearance->hold_reason = implode(', ', $request->input('hold_reason'));
    $clearance->comments = $request->input('hold_comments');
    $clearance->save();

    return redirect()->back()->with('success', 'Clearance is on hold with reasons noted');
}

}
