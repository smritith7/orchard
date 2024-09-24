<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {

        $roles = Role::all();
        return view('backend.pages.roles.user-role', compact('roles'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'role_name' => 'required|string|max:255',
            'permissions' => 'array',
            'permissions.*' => 'string',
        ]);

        // Create the role
        Role::create([
            'name' => $request->role_name,
            'permissions' => json_encode($request->permissions),
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Role created successfully!');

    }

    //destroy
    public function destroy($id)
{
    $role = Role::findOrFail($id);
    $role->delete();

    return redirect()->back()->with('success', 'Role deleted successfully!');
}

}
