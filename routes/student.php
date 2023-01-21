<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student;

Route::middleware(['auth', 'verified', 'role:3'])
  ->prefix('student')
  ->name('student.')
  ->group(function () {
    Route::get('/task', [Student\TaskController::class, 'index'])
      ->name('task');
    Route::get('/task/{slug}', [Student\TaskController::class, 'detail'])
      ->name('task_detail');

    Route::get('/timetable', [Student\TimetableController::class, 'index'])
      ->name('timetable');
    // Later we may add:
    Route::get('/some_page', [Student\SomeController::class, 'index'])
      ->name('some_page');
    Route::get('/another_page', [Student\AnotherController::class, 'index'])
      ->name('another_page');
  });
