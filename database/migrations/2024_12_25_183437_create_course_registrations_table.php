<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE TABLE CourseRegistrations (
                CourseCode VARCHAR(7) NOT NULL,
                StudentID BIGINT UNSIGNED NOT NULL,
                RegistrationYear INT NOT NULL CHECK (RegistrationYear >= 2000),
                RegistrationSemester ENUM('spring', 'fall', 'summer') NOT NULL,
                AbsenceHours DECIMAL(3, 2) NOT NULL,
                ExamDate DATE,
                Grade DECIMAL(3, 2),
                Status ENUM('active', 'completed', 'dropped', 'withdrawn', 'failed', 'pending', 'suspended', 'cancelled', 'incomplete') NOT NULL,
                PRIMARY KEY (CourseCode, StudentID, RegistrationYear, RegistrationSemester),
                FOREIGN KEY (CourseCode) REFERENCES Courses(CourseCode) ON DELETE CASCADE,
                FOREIGN KEY (StudentID) REFERENCES ug_students(id) ON DELETE CASCADE
            );
        ");





    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_registrations');
    }
};
