<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Staff extends Authenticatable
{
    protected $fillable = [
        'name', 'university_email', 'national_id', 'password',
        'date_of_birth', 'sex', 'staff_type'
    ];
}
