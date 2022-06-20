<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return Inertia::render('Auth/Register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|max:191',
                'email' => 'required|unique:users',
                'password' => 'required|min:6',
                'phoneNumber' => 'required|unique:users',
                'type' => 'required',
            ],
            [
                'name.required' => "الإسم مطلوب"
            ]
        );

        if ($validator->fails()) {
            return $validator->errors();
        } else {

            $user = new User();
            $user->name = $request->input("name");
            $user->email = $request->input("email");
            $user->password = Hash::make($request->input("password"));
            $user->phoneNumber = $request->input("phoneNumber");
            $user->type = $request->input("type");
            $user->token = Str::random(60);
            $user->save();
        }

        $request->session()->flash('success', 'User registered successfully! you can sign in now');

        return Redirect::route('showLoginForm');
    }
}
