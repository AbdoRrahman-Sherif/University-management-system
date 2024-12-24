<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


        // try {
      
        // } catch (\Exception $e) {
        //     return redirect()->back()->with('error', $e->getMessage())->withInput();
        // }

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
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'national_id' => 'required|numeric',
            'dob' => 'required',
            'application_type' => 'required'
        ]);

        $email  = $request->email;
        $name = $request->first_name . ' ' . $request->last_name;
        $national_id = $request->national_id;
        $password = bcrypt($request->password);
        $date_of_birth = $request->dob;
        $application_type = $request->application_type;
    
        try {
            DB::statement("INSERT INTO admission_applications (applicant_email, name, national_id, password, date_of_birth, fees_paid, application_type, exam_date, exam_status, created_at, updated_at) 
            VALUES ('$email', '$name', '$national_id', '$password', '$date_of_birth', FALSE, '$application_type', '2025-1-1', 'pending', NOW(), NOW())");

            return redirect()->back()->with('success', 'Admission application submitted successfully.');       
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }

}
    public function dashboard()
    {
        $id = Auth::guard('admission_application')->id();
        $admission = DB::selectOne('SELECT * FROM admission_applications WHERE id = ?', [$id]);
        $faculties = DB::select('SELECT * FROM faculties');

        return view('dashboards.AdmissionApplicationDashboard', compact('admission','faculties'));
    }

    public function show($id)
    {
        return DB::selectOne('SELECT * FROM admission_applications WHERE id = ?', [$id]);
    }

    public function edit()
    {
        $id = Auth::guard('admission_application')->id();
        $admission = DB::selectOne('SELECT * FROM admission_applications WHERE id = ?', [$id]);
        $faculties = DB::select('SELECT * FROM faculties');



        return view('admission.edit', compact('admission','faculties'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'applicant_email' => 'required|email',
            'national_id' => 'required|numeric',
            'date_of_birth' => 'required',
            'application_type' => 'required',
            'fees_paid' => 'required'
        ]);


        $id = $request->id;
        $email  = $request->applicant_email;
        $name = $request->name;
        $national_id = $request->national_id;
        $fees_paid = $request->fees_paid;
        $date_of_birth = $request->date_of_birth;
        $application_type = $request->application_type;

        
        try {
            DB::statement("UPDATE admission_applications SET applicant_email='$email', name='$name', national_id='$national_id', date_of_birth='$date_of_birth', fees_paid = '$fees_paid', application_type='$application_type',updated_at = NOW() WHERE id = ?", [$id]);
            return redirect()->route('admission.dashboard')->with('success', 'Admission application updated successfully.');       
    
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }


    }

    public function destroy()
    {
        $id = Auth::guard('admission_application')->id();
        DB::delete('DELETE FROM admission_applications WHERE id = ?', [$id]);
        return redirect()->route('admission')->with('success', 'Admission application deleted successfully.');       

    }

    public function submitAdmission(Request $request)
    {
        $faculties = DB::select('SELECT * FROM faculties');
        return view('admission', compact('faculties'));
    }


    // public function loginAdmission(Request $request)
    // {
    //     $email = $request->email;
    //     $password = $request->password;
    //     $admission_application =DB::selectOne( "SELECT * FROM admission_applications WHERE applicant_email = '$email'");
    //     $id = DB::selectOne( "SELECT * FROM admission_applications WHERE applicant_email = '$email'")->id;
    //     if ($admission_application && Hash::check($password, $admission_application->password)) {
    //         Auth::guard('admission_application')->loginUsingId($id);
    //         return redirect()->route('admission.dashboard');
    //     }
    // }

    public function loginAdmission(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::guard('admission_application')->attempt(['applicant_email' => $email,'password' => $password])) 
        {
            
            return redirect()->route('admission.dashboard');
        }
        return back()->withErrors(['error' => 'wrong credentials']);
    }

    public function admissionLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admission.logout');       
    }

}
