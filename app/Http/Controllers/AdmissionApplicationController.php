<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdmissionApplicationController extends Controller
{
    public function index()
    {
        return DB::select('SELECT * FROM admission_applications');
    }

    public function create()
    {
        // Return a view for creating an admission application
    }

    public function store(Request $request)
    {
        DB::insert('INSERT INTO admission_applications (applicant_email, name, national_id, password, date_of_birth, fees_paid, application_type, exam_date, exam_status, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())', [
            $request->applicant_email,
            $request->name,
            $request->national_id,
            bcrypt($request->password),
            $request->date_of_birth,
            $request->fees_paid,
            $request->application_type,
            $request->exam_date,
            $request->exam_status
        ]);
    }

    public function show($id)
    {
        return DB::selectOne('SELECT * FROM admission_applications WHERE id = ?', [$id]);
    }

    public function edit($id)
    {
        // Return a view for editing an admission application
    }

    public function update(Request $request, $id)
    {
        DB::update('UPDATE admission_applications SET applicant_email = ?, name = ?, national_id = ?, password = ?, date_of_birth = ?, fees_paid = ?, application_type = ?, exam_date = ?, exam_status = ?, updated_at = NOW() WHERE id = ?', [
            $request->applicant_email,
            $request->name,
            $request->national_id,
            bcrypt($request->password),
            $request->date_of_birth,
            $request->fees_paid,
            $request->application_type,
            $request->exam_date,
            $request->exam_status,
            $id
        ]);
    }

    public function destroy($id)
    {
        DB::delete('DELETE FROM admission_applications WHERE id = ?', [$id]);
    }
}
