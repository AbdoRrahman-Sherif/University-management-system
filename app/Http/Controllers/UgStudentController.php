<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UGStudentController extends Controller
{
    public function index()
    {
        return DB::select('SELECT * FROM ug_students');
    }

    public function create()
    {
        // Return a view for creating an undergraduate student
    }

    public function dashboard()
    {
        $id = Auth::guard('ug_student')->id();
        $student = DB::selectOne
        ('SELECT ug_students.*, faculties.faculty_name AS faculty_name ,professors.name AS advisor_name
        FROM ug_students 
        JOIN faculties ON faculties.id = ug_students.faculty_id 
        JOIN professors ON professors.id = ug_students.academic_advisor 
        WHERE ug_students.id = ?', [$id]);
        return view('dashboards.UgStudentDashboard', compact('student'));
    }

    public function store(Request $request)
    {
        DB::insert('INSERT INTO ug_students (name, university_email, national_id, password, date_of_birth, sex, section, status, allowed_credit_hours, faculty_id, major_code, academic_advisor, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())', [
            $request->name,
            $request->university_email,
            $request->national_id,
            bcrypt($request->password),
            $request->date_of_birth,
            $request->sex,
            $request->section,
            $request->status,
            $request->allowed_credit_hours,
            $request->faculty_id,
            $request->major_code,
            $request->academic_advisor
        ]);
    }

    public function show($id)
    {
        return DB::selectOne('SELECT * FROM ug_students WHERE id = ?', [$id]);
    }

    public function edit($id)
    {
        // Return a view for editing an undergraduate student
    }

    public function update(Request $request, $id)
    {
        DB::update('UPDATE ug_students SET name = ?, university_email = ?, national_id = ?, password = ?, date_of_birth = ?, sex = ?, section = ?, status = ?, allowed_credit_hours = ?, faculty_id = ?, major_code = ?, academic_advisor = ?, updated_at = NOW() WHERE id = ?', [
            $request->name,
            $request->university_email,
            $request->national_id,
            bcrypt($request->password),
            $request->date_of_birth,
            $request->sex,
            $request->section,
            $request->status,
            $request->allowed_credit_hours,
            $request->faculty_id,
            $request->major_code,
            $request->academic_advisor,
            $id
        ]);
    }

    public function destroy($id)
    {
        DB::delete('DELETE FROM ug_students WHERE id = ?', [$id]);
    }
}
