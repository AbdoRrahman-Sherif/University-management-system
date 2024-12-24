<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfessorController extends Controller
{
    public function index()
    {
        return DB::select('SELECT * FROM professors');
    }

    public function professorsPage()
    {
        $professors= DB::select('SELECT * FROM professors');
        return view('professors', compact('professors'));
    }


    public function create()
    {
        // Return a view for creating a professor
    }
    public function dashboard()
    {
        $id = Auth::guard('professor')->id();
        $professor =DB::selectOne
        ('SELECT professors.*, faculties.faculty_name AS faculty_name 
        FROM professors 
        JOIN faculties ON faculties.id = professors.faculty_id 
        WHERE professors.id = ?', [$id]);

        return view('dashboards.ProfessorDashboard', compact('professor'));
    }
    public function store(Request $request)
    {
        DB::insert('INSERT INTO professors (name, university_email, national_id, password, date_of_birth, gender, faculty_id, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), NOW())', [
            $request->name,
            $request->university_email,
            $request->national_id,
            bcrypt($request->password),
            $request->date_of_birth,
            $request->gender,
            $request->faculty_id
        ]);
    }

    public function show($id)
    {
        return DB::selectOne('SELECT * FROM professors WHERE id = ?', [$id]);
    }

    public function edit($id)
    {
        // Return a view for editing a professor
    }

    public function update(Request $request, $id)
    {
        DB::update('UPDATE professors SET name = ?, university_email = ?, national_id = ?, password = ?, date_of_birth = ?, gender = ?, faculty_id = ?, updated_at = NOW() WHERE id = ?', [
            $request->name,
            $request->university_email,
            $request->national_id,
            bcrypt($request->password),
            $request->date_of_birth,
            $request->gender,
            $request->faculty_id,
            $id
        ]);
    }

    public function destroy($id)
    {
        DB::delete('DELETE FROM professors WHERE id = ?', [$id]);
    }
}
