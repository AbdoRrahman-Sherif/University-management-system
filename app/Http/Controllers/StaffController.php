<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function index()
    {
        return DB::select('SELECT * FROM staff');
    }

    public function create()
    {
        // Return a view for creating a staff member
    }

    public function store(Request $request)
    {
        DB::insert('INSERT INTO staff (name, university_email, national_id, password, date_of_birth, sex, staff_type, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), NOW())', [
            $request->name,
            $request->university_email,
            $request->national_id,
            bcrypt($request->password),
            $request->date_of_birth,
            $request->sex,
            $request->staff_type
        ]);
    }

    public function show($id)
    {
        return DB::selectOne('SELECT * FROM staff WHERE id = ?', [$id]);
    }

    public function edit($id)
    {
        // Return a view for editing a staff member
    }

    public function update(Request $request, $id)
    {
        DB::update('UPDATE staff SET name = ?, university_email = ?, national_id = ?, password = ?, date_of_birth = ?, sex = ?, staff_type = ?, updated_at = NOW() WHERE id = ?', [
            $request->name,
            $request->university_email,
            $request->national_id,
            bcrypt($request->password),
            $request->date_of_birth,
            $request->sex,
            $request->staff_type,
            $id
        ]);
    }

    public function destroy($id)
    {
        DB::delete('DELETE FROM staff WHERE id = ?', [$id]);
    }
}
