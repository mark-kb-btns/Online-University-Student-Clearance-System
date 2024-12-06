<?php

namespace App\Http\Controllers;
use App\Models\User;


class StudentInfoController extends Controller
{
    public function show($id)
    {
        $student = User::findOrFail($id);
        return view('clearance_admin_dashboard', compact('student'));
    }

    public function edit($id)
    {
        $student = User::findOrFail($id);
        return view('clearance_admin_dashboard', compact('student'));
    }
}
