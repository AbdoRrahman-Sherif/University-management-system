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

        // Check in the `staff` table
        $staff = DB::table('staff')->where('id', $id)->first();
        if ($staff && Hash::check($password, $staff->password)) {
            Auth::guard('staff')->loginUsingId($id);
            return redirect()->route('staff.dashboard');
        }

        // Check in the `ug_students` table
        $ugStudent = DB::table('ug_students')->where('id', $id)->first();
        if ($ugStudent && Hash::check($password, $ugStudent->password)) {
            Auth::guard('ug_student')->loginUsingId($id);
            return redirect()->route('ug_students.dashboard');
        }

        // Check in the `pg_students` table
        $pgStudent = DB::table('pg_students')->where('id', $id)->first();
        if ($pgStudent && Hash::check($password, $pgStudent->password)) {
            Auth::guard('pg_student')->loginUsingId($id);
            return redirect()->route('pg_students.dashboard');
        }

        // Check in the `professors` table
        $professor = DB::table('professors')->where('id', $id)->first();
        if ($professor && Hash::check($password, $professor->password)) {
            Auth::guard('professor')->loginUsingId($id);
            return redirect()->route('professors.dashboard');
        }

        // If no match is found, return back with an error
        return back()->withErrors(['login_failed' => 'Invalid ID or password.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
