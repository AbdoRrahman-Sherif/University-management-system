<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UGStudent extends Authenticatable
{
    protected $fillable = [
        'id','name', 'university_email', 'national_id', 'password',
        'date_of_birth', 'sex', 'section', 'status',
        'allowed_credit_hours', 'faculty_id', 'major_code', 'academic_advisor'
    ];
}
