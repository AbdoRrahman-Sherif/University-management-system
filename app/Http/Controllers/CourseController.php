<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{

    public function index()
    {
        return DB::select('SELECT * FROM Courses');   
    }

    public function list()
    {
        $courses = DB::select('SELECT * FROM Courses'); 

        if (Auth::guard('ug_student')->check()) {
            $registered = DB::select('SELECT * FROM CourseRegistrations WHERE StudentID = ?', [session('id')]);
            $registeredCourseCodes = [];
            foreach ($registered as $registration) {
                $registeredCourseCodes[] = $registration->CourseCode; // Adjust 'CourseID' to match your database column name
            }
            return view('courses.list_courses', compact('courses', 'registeredCourseCodes'));

        } 
        return view('courses.list_courses', compact('courses'));
    }


    
    public function closeRegistration(Request $request)
    {
        DB::update("UPDATE Courses SET CourseStatus = 'closed registrations' WHERE CourseCode = ?", [$request->CourseCode]);

        return redirect()->route('staff.dashboard')->with('success', 'Registration closed successfully.');
    }

    public function register(Request $request)
    {
        
        $id= session('id'); 

            DB::insert("INSERT INTO CourseRegistrations 
            (CourseCode, StudentID, RegistrationYear, RegistrationSemester, AbsenceHours, ExamDate, Grade, Status)
            VALUES (?, ?, YEAR(NOW()), 'fall', 0, '2025-1-1', 1, 'active')",
            [
                $request->CourseCode,
                $id

                
            ]
        );

        return redirect()->route('ug_students.dashboard')->with('success', 'Course registered successfully.');
    }


    public function create()
    {
        $professors = DB::select("SELECT id, name FROM professors");
        return view('courses.create_course', compact('professors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'CourseCode' => 'required|max:7|unique:Courses',
            'CourseName' => 'required|max:50',
            'CreditHours' => 'required|integer|between:1,5',
            'CourseStatus' => 'required',
            'ProfessorID' => 'required|exists:professors,id',
        ]);

        DB::statement("INSERT INTO Courses (CourseCode, CourseName, CreditHours, CourseStatus) VALUES (?, ?, ?, ?)", [
            $request->CourseCode,
            $request->CourseName,
            $request->CreditHours,
            $request->CourseStatus
        ]);

        DB::statement("INSERT INTO ProfessorsTeachesCourses (ProfessorID, CourseCode) VALUES (?, ?)", [
            $request->ProfessorID,
            $request->CourseCode
        ]);

        return redirect()->route('staff.dashboard')->with('success', 'Course created successfully.');
    }

    public function edit($id)
    {
        $course = DB::selectOne("SELECT * FROM Courses WHERE CourseCode = ?", [$id]);
        $professors = DB::select("SELECT id, name FROM professors");
        return view('courses.edit_course', compact('course', 'professors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'CourseName' => 'required|max:50',
            'CreditHours' => 'required|integer|between:1,5',
            'CourseStatus' => 'required',
            'ProfessorID' => 'required|exists:professors,id',
        ]);

        DB::statement("UPDATE Courses SET CourseName = ?, CreditHours = ?, CourseStatus = ? WHERE CourseCode = ?", [
            $request->CourseName,
            $request->CreditHours,
            $request->CourseStatus,
            $id
        ]);

        DB::statement("UPDATE ProfessorsTeachesCourses SET ProfessorID = ? WHERE CourseCode = ?", [
            $request->ProfessorID,
            $id
        ]);

        return redirect()->route('staff.dashboard')->with('success', 'Course updated successfully.');
    }

    public function destroy($id)
    {
        DB::statement("DELETE FROM ProfessorsTeachesCourses WHERE CourseCode = ?", [$id]);
        DB::statement("DELETE FROM Courses WHERE CourseCode = ?", [$id]);

        return redirect()->route('staff.dashboard')->with('success', 'Course deleted successfully.');
    }
}
