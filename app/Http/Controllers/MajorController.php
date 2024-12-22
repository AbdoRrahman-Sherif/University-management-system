<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MajorController extends Controller
{
    public function index()
    {
        return DB::select('SELECT * FROM majors');
    }

    public function create()
    {
        // Return a view for creating a major
    }

    public function store(Request $request)
    {
        DB::insert('INSERT INTO majors (faculty_id, major_code, major_name, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())', [
            $request->faculty_id,
            $request->major_code,
            $request->major_name
        ]);
    }

    public function show($faculty_id, $major_code)
    {
        return DB::selectOne('SELECT * FROM majors WHERE faculty_id = ? AND major_code = ?', [$faculty_id, $major_code]);
    }

    public function edit($faculty_id, $major_code)
    {
        // Return a view for editing a major
    }

    public function update(Request $request, $faculty_id, $major_code)
    {
        DB::update('UPDATE majors SET major_name = ?, updated_at = NOW() WHERE faculty_id = ? AND major_code = ?', [
            $request->major_name, $faculty_id, $major_code
        ]);
    }

    public function destroy($faculty_id, $major_code)
    {
        DB::delete('DELETE FROM majors WHERE faculty_id = ? AND major_code = ?', [$faculty_id, $major_code]);
    }
}
