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


        DB::statement("CREATE TABLE CoursePrerequisite (
            CourseCode VARCHAR(7) NOT NULL,
            PrerequisiteCourse VARCHAR(7) NOT NULL,
            PRIMARY KEY (CourseCode, PrerequisiteCourse),
            FOREIGN KEY (CourseCode) REFERENCES Courses(CourseCode) ON DELETE CASCADE,
            FOREIGN KEY (PrerequisiteCourse) REFERENCES Courses(CourseCode) ON DELETE CASCADE
        );
    ");
    

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_prerequisite');
    }
};