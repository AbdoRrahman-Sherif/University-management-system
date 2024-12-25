<?php

namespace App\Http\Controllers;

use App\Models\CourseRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseRegistrationController extends Controller
{
    public function index()
    {
        $registrations = DB::select("SELECT * FROM CourseRegistrations");
        return view('course_registrations.index', compact('registrations'));
    }

    public function create()
    {
        return view('course_registrations.create');
    }

    public function store(Request $request)
    {
        DB::insert("
            INSERT INTO CourseRegistrations 
            (CourseCode, StudentID, RegistrationYear, RegistrationSemester, AbsenceHours, ExamDate, Grade, Status)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)",
            [
                $request->CourseCode,
                $request->StudentID,
                $request->RegistrationYear,
                $request->RegistrationSemester,
                $request->AbsenceHours,
                $request->ExamDate,
                $request->Grade,
                $request->Status
            ]
        );

        return redirect()->back()->with('success', 'Course registration added successfully.');
    }

    public function show($courseCode, $studentID, $year, $semester)
    {
        $registration = DB::selectOne("
            SELECT * FROM CourseRegistrations 
            WHERE CourseCode = ? AND StudentID = ? AND RegistrationYear = ? AND RegistrationSemester = ?",
            [$courseCode, $studentID, $year, $semester]
        );

        return view('course_registrations.show', compact('registration'));
    }

    public function edit($courseCode, $studentID, $year, $semester)
    {
        // Fetch specific registration for editing
        $registration = DB::selectOne("
            SELECT * FROM CourseRegistrations 
            WHERE CourseCode = ? AND StudentID = ? AND RegistrationYear = ? AND RegistrationSemester = ?",
            [$courseCode, $studentID, $year, $semester]
        );

        return view('course_registrations.edit', compact('registration'));
    }

    public function update(Request $request, $courseCode, $studentID, $year, $semester)
    {
        // Update specific course registration
        DB::update("
            UPDATE CourseRegistrations 
            SET AbsenceHours = ?, ExamDate = ?, Grade = ?, Status = ? 
            WHERE CourseCode = ? AND StudentID = ? AND RegistrationYear = ? AND RegistrationSemester = ?",
            [
                $request->AbsenceHours,
                $request->ExamDate,
                $request->Grade,
                $request->Status,
                $courseCode,
                $studentID,
                $year,
                $semester
            ]
        );

        return redirect()->back()->with('success', 'Course registration updated successfully.');
    }

    public function destroy($courseCode, $studentID, $year, $semester)
    {
        // Delete specific course registration
        DB::delete("
            DELETE FROM CourseRegistrations 
            WHERE CourseCode = ? AND StudentID = ? AND RegistrationYear = ? AND RegistrationSemester = ?",
            [$courseCode, $studentID, $year, $semester]
        );

        return redirect()->back()->with('success', 'Course registration deleted successfully.');
    }
}
