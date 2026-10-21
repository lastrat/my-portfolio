<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('experiences', function (Blueprint $table) {
            $table->text('title_fr')->nullable()->after('title');
            $table->text('title_en')->nullable()->after('title_fr');
            $table->text('description_fr')->nullable()->after('description');
            $table->text('description_en')->nullable()->after('description_fr');
        });

        Schema::table('education', function (Blueprint $table) {
            $table->text('title_fr')->nullable()->after('title');
            $table->text('title_en')->nullable()->after('title_fr');
            $table->text('description_fr')->nullable()->after('description');
            $table->text('description_en')->nullable()->after('description_fr');
        });
    }

    public function down(): void
    {
        Schema::table('experiences', function (Blueprint $table) {
            $table->dropColumn(['title_fr', 'title_en', 'description_fr', 'description_en']);
        });

        Schema::table('education', function (Blueprint $table) {
            $table->dropColumn(['title_fr', 'title_en', 'description_fr', 'description_en']);
        });
    }
};
