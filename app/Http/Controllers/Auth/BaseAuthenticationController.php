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

        $staff = DB::selectOne( "SELECT id, password FROM staff WHERE id = $id");
        if ($staff && Hash::check($password, $staff->password)) {
            Auth::guard('staff')->loginUsingId($id);
            return redirect()->route('staff.dashboard');
        }

        $ugStudent =DB::selectOne( "SELECT id, password FROM ug_students WHERE id = $id");
        
        if ($ugStudent && Hash::check($password, $ugStudent->password)) {
            Auth::guard('ug_student')->loginUsingId($id);
            return redirect()->route('ug_students.dashboard');
        }

        $pgStudent = DB::selectOne( "SELECT id, password FROM pg_students WHERE id = $id");
        if ($pgStudent && Hash::check($password, $pgStudent->password)) {
            Auth::guard('pg_student')->loginUsingId($id);
            return redirect()->route('pg_students.dashboard');
        }

        $professor =DB::selectOne( "SELECT id, password FROM professors WHERE id = $id");
        if ($professor && Hash::check($password, $professor->password)) {
            Auth::guard('professor')->loginUsingId($id);
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
