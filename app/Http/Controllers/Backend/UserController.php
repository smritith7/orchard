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
        })
        ->orderBy('full_name', 'Asc')
        ->paginate(10);

        return view('backend.pages.users.index', compact('users', 'search'));
    }

    // Role-based User Listing
    public function admin(Request $request)
    {
        $search = $request->get('search');
        $users = User::where('role', 'admin')
            ->when($search, function ($query, $search) {
                return $query->where('full_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone_no', 'like', "%{$search}%");
            })
            ->orderBy('full_name', 'asc')
            ->paginate(10);

        return view('backend.pages.users.index', compact('users', 'search'));
    }

    public function employee(Request $request)
    {
        $search = $request->get('search');
        $users = User::where('role', 'employee')
            ->when($search, function ($query, $search) {
                return $query->where('full_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone_no', 'like', "%{$search}%");
            })
            ->orderBy('full_name', 'asc')
            ->paginate(10);

        return view('backend.pages.users.employee', compact('users', 'search'));
    }

    public function customer(Request $request)
    {
        $search = $request->get('search');
        $users = User::where('role', 'customer')
            ->when($search, function ($query, $search) {
                return $query->where('full_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone_no', 'like', "%{$search}%");
            })
            ->orderBy('full_name', 'asc')
            ->paginate(10);

        return view('backend.pages.users.customer', compact('users', 'search'));
    }

    // Other User Methods (store, create, edit, update, destroy)
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
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'full_name' => $validatedData['full_name'],
            'email' => $validatedData['email'],
            'phone_no' => $validatedData['phone_no'],
            'password' => Hash::make($validatedData['password']),
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
            'phone_no' => 'required|string|max:20',
            'password' => 'nullable|string|min:8',
        ]);

        $user = User::findOrFail($id);
        $user->full_name = $validatedData['full_name'];
        $user->email = $validatedData['email'];
        $user->phone_no = $validatedData['phone_no'];

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
