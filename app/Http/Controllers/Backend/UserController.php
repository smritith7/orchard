<?php

namespace App\Http\Controllers\Backend;

use App\Models\Role;
use App\Models\User;
use App\Models\AdminInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Users\CreateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role_id','!=',3)
        ->where ('is_chef',false)
        ->with(['adminInfo','role'])->get();
        return view('backend.pages.users.index', compact('users'));
    }






    // Show method to display details of a specific product
    public function show($id)
    {
        $user = User::with('adminInfo')
            ->findOrFail($id);

        return view('backend.pages.users.show', ['user' => $user]);
    }

    // Create method to display the form for creating a new product
    public function create()
    {
        $roles=Role::where('id','!=',3)->get();
        return view('backend.pages.users.create')
        ->with(['roles'=>$roles]);
    }

    // Store method to handle the creation of a new product
    public function store(CreateUserRequest $request) {
        $validatedData = $request->validated();

        $user = User::create([
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role_id' => $validatedData['role_id'],
        ]);


        $user->adminInfo()->create([
            'first_name' => $validatedData['firstname'],
            'last_name' => $validatedData['lastname'],
            'gender' => $validatedData['Gender'],
            'phone_no' => $validatedData['phone_no'],
            'address' => $validatedData['address'],
            'nationality' => $validatedData['Nationality'],
        ]);
        toastr()->success('user has been saved successfully!', 'Congrats');

        return redirect()->route('backend.users.index');
    }



    // Edit method to display the form for editing a user
    public function edit($id)
    {
        $user = User::with("adminInfo")->findOrFail($id);
        return view('backend.pages.users.edit', ['user' => $user]);
    }

    // Update method to handle the updating of a user
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',

        ]);

        $user = user::findOrFail($id);

        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
        ]);

        return redirect()->route('backend.users.index')->with('success', 'user updated successfully!');
    }

    // Destroy method to handle the deletion of a user
    public function destroy($id)
    { $adminInfo = AdminInfo::where ('user_id','=',$id)->first();
        if (!$adminInfo){
            return redirect()->back()->with ('error');
        }
        $adminInfo->delete();
        $users = User::findOrFail($id);
        $users->delete();

        return redirect()->route('backend.users.index')->with('success', 'user deleted successfully!');
    }
}


