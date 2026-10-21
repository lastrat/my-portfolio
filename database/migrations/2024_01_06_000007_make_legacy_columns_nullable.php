<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $driver = DB::getDriverName();

        if ($driver === 'mysql') {
            DB::statement('ALTER TABLE projects MODIFY description TEXT NULL');
            DB::statement('ALTER TABLE experiences MODIFY title VARCHAR(255) NULL');
            DB::statement('ALTER TABLE education MODIFY title VARCHAR(255) NULL');
            return;
        }

        if (Schema::hasColumn('projects', 'description')) {
            DB::statement('UPDATE projects SET description = description_fr WHERE description IS NULL AND description_fr IS NOT NULL');
        }

        if (Schema::hasColumn('experiences', 'title')) {
            DB::statement('UPDATE experiences SET title = title_fr WHERE title IS NULL AND title_fr IS NOT NULL');
        }

        if (Schema::hasColumn('education', 'title')) {
            DB::statement('UPDATE education SET title = title_fr WHERE title IS NULL AND title_fr IS NOT NULL');
        }
    }

    public function down(): void
    {
        $driver = DB::getDriverName();

        if ($driver === 'mysql') {
            DB::statement('ALTER TABLE projects MODIFY description TEXT NOT NULL');
            DB::statement('ALTER TABLE experiences MODIFY title VARCHAR(255) NOT NULL');
            DB::statement('ALTER TABLE education MODIFY title VARCHAR(255) NOT NULL');
        }
    }
};
