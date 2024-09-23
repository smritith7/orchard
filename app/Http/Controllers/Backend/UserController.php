<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
{
    $search = $request->get('search');

    $users = User::when($search, function ($query, $search) {
        return $query->where('full_name', 'like', "%{$search}%")
                     ->orWhere('email', 'like', "%{$search}%")
                     ->orWhere('phone_no', 'like', "%{$search}%");
    })->paginate(10);

    return view('backend.pages.users.index', compact('users', 'search'));
}
    public function create()
    {
        return view('backend.pages.users.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_no' => 'required|string|max:20',
            'role' => 'required|string',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'full_name' => $validatedData['full_name'],
            'email' => $validatedData['email'],
            'phone_no' => $validatedData['phone_no'],
            'password' => Hash::make($validatedData['password']),
            'role' => $validatedData['role'],
        ]);

        return redirect()->route('backend.user.index')->with('success', 'User added successfully.');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('backend.pages.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.pages.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone_no' => 'required|string|max:15',
            'role' => 'required|string',
            'password' => 'nullable|string|min:8', // Make password optional
        ]);

        $user = User::findOrFail($id);

        // Update user details
        $user->full_name = $validatedData['full_name'];
        $user->email = $validatedData['email'];
        $user->phone_no = $validatedData['phone_no'];
        $user->role = $validatedData['role'];

        // Handle password update if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($validatedData['password']);
        }

        $user->save();

        return redirect()->route('backend.user.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('backend.user.index')->with('success', 'User deleted successfully.');
    }
}

