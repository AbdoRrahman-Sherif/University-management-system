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
        DB::statement("ALTER TABLE faculties
        ADD COLUMN dean_id BIGINT UNSIGNED NULL,
        ADD CONSTRAINT fk_dean FOREIGN KEY (dean_id) REFERENCES professors(id);
    ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE faculties DROP FOREIGN KEY fk_dean");
        DB::statement("ALTER TABLE faculties DROP COLUMN dean_id");
    }
};
