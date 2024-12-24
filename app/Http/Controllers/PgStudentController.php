<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PGStudentController extends Controller
{
    public function index()
    {
        return DB::select('SELECT * FROM pg_students');
    }

    public function create()
    {
        // Return a view for creating a postgraduate student
    }
    public function dashboard()
    {
        $id = Auth::guard('pg_student')->id();
        $student = DB::selectOne
        ('SELECT pg_students.*, faculties.faculty_name AS faculty_name 
        FROM pg_students 
        JOIN faculties ON faculties.id = pg_students.faculty_id 
        WHERE pg_students.id = ?', [$id]);
    
        return view('dashboards.PgStudentDashboard', compact('student'));
    }

    public function store(Request $request)
    {
        DB::insert('INSERT INTO pg_students (name, university_email, national_id, password, date_of_birth, gender, status, section, graduate_program, is_TA, allowed_credit_hours, faculty_id, major_code, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())', [
            $request->name,
            $request->university_email,
            $request->national_id,
            bcrypt($request->password),
            $request->date_of_birth,
            $request->gender,
            $request->status,
            $request->section,
            $request->graduate_program,
            $request->is_TA,
            $request->allowed_credit_hours,
            $request->faculty_id,
            $request->major_code
        ]);
    }

    public function show($id)
    {
        return DB::selectOne('SELECT * FROM pg_students WHERE id = ?', [$id]);
    }

    public function edit($id)
    {
        // Return a view for editing a postgraduate student
    }

    public function update(Request $request, $id)
    {
        DB::update('UPDATE pg_students SET name = ?, university_email = ?, national_id = ?, password = ?, date_of_birth = ?, gender = ?, status = ?, section = ?, graduate_program = ?, is_TA = ?, allowed_credit_hours = ?, faculty_id = ?, major_code = ?, updated_at = NOW() WHERE id = ?', [
            $request->name,
            $request->university_email,
            $request->national_id,
            bcrypt($request->password),
            $request->date_of_birth,
            $request->gender,
            $request->status,
            $request->section,
            $request->graduate_program,
            $request->is_TA,
            $request->allowed_credit_hours,
            $request->faculty_id,
            $request->major_code,
            $id
        ]);
    }

    public function destroy($id)
    {
        DB::delete('DELETE FROM pg_students WHERE id = ?', [$id]);
    }
}
