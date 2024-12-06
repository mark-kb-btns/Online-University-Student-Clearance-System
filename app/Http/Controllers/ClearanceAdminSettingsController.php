<?php namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ClearanceAdminSettingsController extends Controller
{
        public function index()
    {
        // Fetch admin users
        $admins = User::where('user_role', 'admin')
            ->paginate(10);

        // Fetch staff users
        $staff = User::where('user_role', 'department')
            ->with(['department', 'program']) // Include relationships if needed
            ->paginate(10);

        return view('clearance_admin_settings', compact('admins', 'staff'));
    }


    public function create() {
        // Return view with form to create a new user
        return view('admin.users.create');
    }

    public function store(Request $request) {
        // Validate and store the new user
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:admin,staff',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully');
    }

    public function edit($id) {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id) {
        $user = User::find($id);
        
        $request->validate([
            'user_name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'user_password' => 'nullable|min:8',
            'department_id' => 'nullable',
            'program_id' => 'nullable',
            'user_role' => 'nullable',
        ]);

        $user->update([
            'user_name' => $request->user_name,
            'email' => $request->email,
            'user_password' => $request->user_password ? bcrypt($request->user_password) : $user->user_password,
            'department_id' => $request->department_id,
            'program_id' => $request->program_id,
            'user_role' => $request->user_role,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }

    public function destroy($id) {
        $user = User::find($id);
        $user->delete();
        
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }
}
