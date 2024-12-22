<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdmissionApplication extends Model
{
    protected $fillable = [
        'applicant_email', 'name', 'national_id', 'password',
        'date_of_birth', 'fees_paid', 'application_type', 'exam_date', 'exam_status'
    ];
}
