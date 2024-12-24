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
    public function up() : void
    {
        DB::statement("DROP VIEW IF EXISTS students");
        DB::statement("DROP VIEW IF EXISTS academic_members");
        DB::statement("DROP VIEW IF EXISTS combined_users");

        DB::statement("CREATE VIEW students AS 
            SELECT id FROM ug_students
            UNION
            SELECT id FROM pg_students
        ");
    
        DB::statement("
            CREATE VIEW academic_members AS 
            SELECT id FROM ug_students
            UNION
            SELECT id FROM pg_students
            UNION
            SELECT id FROM professors
        ");
    
        DB::statement("
            CREATE VIEW combined_users AS 
            SELECT id FROM staff
            UNION
            SELECT id FROM ug_students
            UNION
            SELECT id FROM pg_students
            UNION
            SELECT id FROM professors
        ");
    }
    
    public function down() : void
    {
        DB::statement("DROP VIEW IF EXISTS combined_users");
        DB::statement("DROP VIEW IF EXISTS academic_members");
        DB::statement("DROP VIEW IF EXISTS students");
    }
    
};
