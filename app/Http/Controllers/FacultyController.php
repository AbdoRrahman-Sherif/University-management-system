<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacultyController extends Controller
{
    public function index()
    {
        return DB::select('SELECT * FROM faculties');
    }

    public function create()
    {
        // Return a view for creating a faculty
    }

    public function facultiesPage()
    {
        $faculties= DB::select('SELECT * FROM faculties'
    
    );
        return view('faculties', compact('faculties'));
    }

    public function store(Request $request)
    {
        DB::insert('INSERT INTO faculties (faculty_name, created_at, updated_at) VALUES (?, NOW(), NOW())', [
            $request->faculty_name
        ]);
    }

    public function show($id)
    {
        return DB::selectOne('SELECT * FROM faculties WHERE id = ?', [$id]);
    }

    public function edit($id)
    {
        // Return a view for editing a faculty
    }

    public function update(Request $request, $id)
    {
        DB::update('UPDATE faculties SET faculty_name = ?, updated_at = NOW() WHERE id = ?', [
            $request->faculty_name, $id
        ]);
    }

    public function destroy($id)
    {
        DB::delete('DELETE FROM faculties WHERE id = ?', [$id]);
    }
}
