<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BaseAuthenticationController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'password' => 'required|string',
        ]);

        $id = $request->id;
        $password = $request->password;


        if (Auth::guard('staff')->attempt(['id' => $id,'password' => $password])) 
        {
            session(['id' => Auth::guard('staff')->id()]); 


            return redirect()->route('staff.dashboard');
        }



        if (Auth::guard('ug_student')->attempt(['id' => $id, 'password' => $password])) {
            session(['id' => Auth::guard('ug_student')->id()]); 

            return redirect()->route('ug_students.dashboard');
        }
        

        if (Auth::guard('pg_student')->attempt(['id' => $id, 'password' => $password])) {
            session(['id' => Auth::guard('pg_student')->id()]); 

            return redirect()->route('pg_students.dashboard');
        }
        
        

        if (Auth::guard('professor')->attempt(['id' => $id, 'password' => $password])) {
            session(['id' => Auth::guard('professor')->id()]); 

            return redirect()->route('professors.dashboard');
        }


        return back()->withErrors(['login_failed' => 'Invalid id or password']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
