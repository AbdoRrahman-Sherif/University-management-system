<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Professor extends Authenticatable
{
    protected $fillable = [
        'id','name', 'university_email', 'national_id', 'password',
        'date_of_birth', 'gender', 'faculty_id'
    ];
}
