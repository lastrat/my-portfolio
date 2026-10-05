<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

Route::get('/login', [AdminController::class, 'loginForm'])->name('login');
Route::post('/login', [AdminController::class, 'login'])->name('login');
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/projects', [AdminController::class, 'projects'])->name('projects');
    Route::get('/projects/create', [AdminController::class, 'createProject'])->name('projects.create');
    Route::post('/projects', [AdminController::class, 'storeProject'])->name('projects.store');
    Route::get('/projects/{project}/edit', [AdminController::class, 'editProject'])->name('projects.edit');
    Route::put('/projects/{project}', [AdminController::class, 'updateProject'])->name('projects.update');
    Route::delete('/projects/{project}', [AdminController::class, 'destroyProject'])->name('projects.destroy');

    Route::get('/experiences', [AdminController::class, 'experiences'])->name('experiences');
    Route::get('/experiences/create', [AdminController::class, 'createExperience'])->name('experiences.create');
    Route::post('/experiences', [AdminController::class, 'storeExperience'])->name('experiences.store');
    Route::get('/experiences/{experience}/edit', [AdminController::class, 'editExperience'])->name('experiences.edit');
    Route::put('/experiences/{experience}', [AdminController::class, 'updateExperience'])->name('experiences.update');
    Route::delete('/experiences/{experience}', [AdminController::class, 'destroyExperience'])->name('experiences.destroy');

    Route::get('/education', [AdminController::class, 'education'])->name('education');
    Route::get('/education/create', [AdminController::class, 'createEducation'])->name('education.create');
    Route::post('/education', [AdminController::class, 'storeEducation'])->name('education.store');
    Route::get('/education/{education}/edit', [AdminController::class, 'editEducation'])->name('education.edit');
    Route::put('/education/{education}', [AdminController::class, 'updateEducation'])->name('education.update');
    Route::delete('/education/{education}', [AdminController::class, 'destroyEducation'])->name('education.destroy');

    Route::get('/tech', [AdminController::class, 'tech'])->name('tech');
    Route::get('/tech/create', [AdminController::class, 'createTech'])->name('tech.create');
    Route::post('/tech', [AdminController::class, 'storeTech'])->name('tech.store');
    Route::get('/tech/{tech}/edit', [AdminController::class, 'editTech'])->name('tech.edit');
    Route::put('/tech/{tech}', [AdminController::class, 'updateTech'])->name('tech.update');
    Route::delete('/tech/{tech}', [AdminController::class, 'destroyTech'])->name('tech.destroy');

    Route::get('/contacts', [AdminController::class, 'contacts'])->name('contacts');
    Route::delete('/contacts/{contact}', [AdminController::class, 'destroyContact'])->name('contacts.destroy');
});

