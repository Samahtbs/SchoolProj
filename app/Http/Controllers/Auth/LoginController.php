<?php

namespace App\Http\Controllers\Auth;

use Inertia\Inertia;
use Illuminate\Support\Str;
use App\Models\classTeacher;
use App\Models\studentclass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return Inertia::render('Auth/Login');
    }

    public function authenticate(Request $request)
    {

        $credentials = $this->validate($request, [
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth()->user();
            $user->token = Str::random(60);
            //$user->save();
            if ($user->type == 1) {
                //************teacher*************//
                return redirect()->intended('teacher');
            } else if ($user->type == 2) {
                //************student*************//
                return redirect()->intended('student');
            } else if ($user->type == 3) {
                //************admin*************//
                return Inertia::render('AdminPanel');

                //return redirect()->intended('AdminPanel')->withSuccess('You have Successfully loggedin');  
            }
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);


        //*****************************
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $email = $request->input('email');
        $password = $request->input('password');

        if (auth::attempt(['email' => $email, 'password' => $password])) {
            $user = auth()->user();
            $user->token = Str::random(60);
            //$user->save();
            if ($user->type == 1) {
                //teacher
                $list = classTeacher::where('teacherId', $user->id)->get();
                return view('teacher', ['list' => $list]);
            } else if ($user->type == 2) {
                //student
                $list = studentclass::where('studentid', $user->id)->get();

                foreach ($list as $lii) {
                    $lii['name'] = classTeacher::find($lii['classid'])['ClassName'];
                }

                return view('student', ['list' => $list/*,'names'=>$names*/]);
            } else if ($user->type == 3) {
                //admin
                return redirect()->intended('AdminPanel')
                    ->withSuccess('You have Successfully loggedin');
            }
        }
        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
        //***************************** 
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
