<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginCheck(Request $request)
    {
        try {

            //-- form array to keep email and password
            $credentials = $request->only('email', 'password');
            //-- remove previous session and generate a new session for new logged in user.
            $request->session()->regenerate();
            // Attemp to login
            if (Auth::attempt($credentials)) {
                return redirect()->route('backend.dashboard')
                    ->withSuccess('You have successfully logged in!');
            }
            //-- Succedded then redirect to another route
            return redirect()->route('login')
                ->withError('Invalid Credentials!');
        } catch (\Throwable $th) {
            //throw $th;
            return back();
        }
    }

    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function storeUser(Request $request)
    {

        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|max:250|unique:users',
                'password' => 'required|min:8'

            ]);
            if ($validator->fails()) {
                toastr()->error('Validation Error');
            }
            $validated  =$validator->validated();
            dd($validated);

            $user = User::create([
                'email' => $validated['email'],
                'password' => Hash::make($validated['password'])
            ]);



            toastr()->success('New User registered successfully!');

            return redirect()->route('backend.users.index');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');
        ;
    }

    public function profilesetting(Request $request)
    {
       $profile=User::where('id',Auth::id())->with('adminInfo')->first();
       dd($profile);
return view('backend.auth.pages.profile-setting')->with(['user'=>$profile]);



    }

}
