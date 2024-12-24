<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class PGStudent extends Authenticatable
{
    protected $fillable = [
        'id','name', 'university_email', 'national_id', 'password',
        'date_of_birth', 'gender', 'status', 'section', 'graduate_program',
        'is_TA', 'allowed_credit_hours', 'faculty_id', 'major_code'
    ];
}
