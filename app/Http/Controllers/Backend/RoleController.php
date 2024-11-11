<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        $roles = Role::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->paginate(10);

        return view('backend.pages.roles.user-role', compact('roles', 'search'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'permissions' => 'array',
            'permissions.*' => 'string',
        ]);

        // Create the role
        Role::create([
            'name' => $request->name,
            'permissions' => json_encode($request->permissions),
        ]);
        return redirect()->back()->with('success', 'Role created successfully!');
    }

    public function show($id)
    {
        $role = Role::findOrFail($id);
        return view('backend.pages.roles.show-role', compact('role'));
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('backend.pages.roles.edit-role', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'permissions' => 'array',
            'permissions.*' => 'string',
        ]);

        $role = Role::findOrFail($id);

        // Update role details
        $role->name = $validateData['name'];
        $role->permissions = isset($validateData['permissions']) ? json_encode($validateData['permissions']) : json_encode([]);

        $role->save();

        return redirect()->route('backend.roles.user-role')->with('success', 'Role updated successfully.');
    }

    // Destroy method
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->back()->with('success', 'Role deleted successfully!');
    }
}
