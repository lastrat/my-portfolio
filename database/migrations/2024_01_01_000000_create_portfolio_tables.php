<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('role');
            $table->string('year');
            $table->string('client');
            $table->json('tech');
            $table->string('image')->nullable();
            $table->string('slug')->unique();
            $table->timestamps();
        });

        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('year');
            $table->string('title');
            $table->string('company');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->string('year');
            $table->string('title');
            $table->string('company');
            $table->text('description')->nullable();
            $table->string('location')->nullable();
            $table->float('lat')->nullable();
            $table->float('lng')->nullable();
            $table->timestamps();
        });

        Schema::create('techs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->text('icon')->nullable();
            $table->timestamps();
        });

        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('company')->nullable();
            $table->text('description')->nullable();
            $table->string('location')->nullable();
            $table->float('lat')->nullable();
            $table->float('lng')->nullable();
            $table->timestamps();
        });

        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->text('message');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
        Schema::dropIfExists('experiences');
        Schema::dropIfExists('education');
        Schema::dropIfExists('techs');
        Schema::dropIfExists('skills');
        Schema::dropIfExists('contacts');
    }
};
