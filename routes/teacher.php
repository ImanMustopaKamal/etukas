<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher;

Route::middleware(['auth', 'verified', 'role:4'])
  ->prefix('teacher')
  ->name('teacher.')
  ->group(function () {
    Route::get('/timetable', [Teacher\TimetableController::class, 'index'])
      ->name('timetable');

    Route::get('/task', [Teacher\TaskController::class, 'index'])
      ->name('task');
    Route::get('/task/create', [Teacher\TaskController::class, 'create'])
      ->name('task_create');
    Route::post('/task/store', [Teacher\TaskController::class, 'store'])
      ->name('task_store');
  });