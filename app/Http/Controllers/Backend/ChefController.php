<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\ChefInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Users\CreateUserRequest;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class ChefController extends Controller
{
    public function index()
    {
        $users = User::where('is_chef', '=', true)->with("chefInfo")->get();
        return view('backend.pages.chefs.index')
            ->with(['users' => $users]);
    }

    public function show($id)
    {
        $user = ChefInfo::with('user')
            ->findOrFail($id);

        return view('backend.pages.chefs.show', ['user' => $user]);
    }


    public function create()
    {
        return view('backend.pages.chefs.create');
    }

    // Store method to handle the creation of a new chef

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'password' => 'required',
            'email' => 'required|string',
            'Gender' => 'required|string',
            'phone_no' => 'required|string',
            'level' => 'required',


        ]);
        if ($validator->fails()) {
            dd($validator->errors());
            return view('backend.pages.chefs.create')
                ->with([$validator->errors()]);

        }
        $validated = $validator->validated();

        $user = User::create([
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role_id' => Role::where('name', 'chef')->pluck('id')->first(),
            'is_chef' => true,
        ]);

        $user->ChefInfo()->create([
            //'user_id' => $user->id,
            'first_name' => $validated['firstname'],
            'last_name' => $validated['lastname'],
            'gender' => $validated['Gender'],
            'phone_no' => $validated['phone_no'],
            'level' => $validated['level'],
        ]);
        toastr()->success('chef has been saved successfully!', 'Congrats');
        return redirect()
            ->route('backend.chefs.index');
        // ->with('success', 'chef create successfully!');


    }
    public function edit($id)
    {
        $user = ChefInfo::with('user')->findOrFail($id);
        return view('backend.pages.chefs.edit', ['user' => $user]);



    }

    public function update(Request $request, $id)
    {
        // dd(Role::where('name','chief')->pluck('id')->first());

        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'password' => 'required',
            'email' => 'required|string',
            'gender' => 'required|string',
            'phone_no' => 'required|string',
            'level' => 'required',
        ]);


        if ($validator->fails()) {
            //  fail logic
            return view('backend.pages.chefs.edit')
                ->with($validator->errors());
        }
        $validated = $validator->validated();

        $user = ChefInfo::findOrFail($id);

        $user->update([
            'first_name' => $validated['firstname'],
            'last_name' => $validated['lastname'],
            'email' => $validated['email'],
            'gender' => $validated['gender'],
            'phone_no' => $validated['phone_no'],
            'level' => $validated['level'],
            'role_id' => Role::where('name', 'chief')->pluck('id')->first()

        ]);
        return redirect()
            ->route('backend.chefs.index')
            ->with('success', 'chef updated successfully!');
    }

    public function destroy($id)
    {

        //-- Find the user
        //-- Find the ChefInfo using User_id
        //-- Delete found user
        //-- Delete found chefInfo

        $chefInfo = ChefInfo::findOrFail($id);
        $user = User::findOrfail($chefInfo->user_id);

        $chefInfo->delete();
        $user->delete();


        return redirect()->route('backend.chefs.index')->with('success', 'chef delete successfully');
    }



}
