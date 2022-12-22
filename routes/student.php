<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])
  ->prefix('student')
  ->name('student.')
  ->group(function () {
    Route::get('/timetable', [\App\Http\Controllers\Student\TimetableController::class, 'index'])
      ->name('timetable');
    // Later we may add:
    Route::get('/some_page', [\App\Http\Controllers\Student\SomeController::class, 'index'])
      ->name('some_page');
    Route::get('/another_page', [\App\Http\Controllers\Student\AnotherController::class, 'index'])
      ->name('another_page');
  });
