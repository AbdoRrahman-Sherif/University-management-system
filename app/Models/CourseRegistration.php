<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseRegistration extends Model
{
    protected $fillable = ['CourseCode', 'StudentID', 'RegistrationYear', 'RegistrationSemester', 'AbsenceHours', 'ExamDate', 'Grade', 'Status'];
}
