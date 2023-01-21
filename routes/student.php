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
    Route::get('/task/data/{task_id}', [Student\TaskController::class, 'dataDetail'])
      ->name('task_dataDetail');
    Route::post('/task/question/get', [Student\TaskController::class, 'question'])
      ->name('task_question');
    Route::post('/task/answer', [Student\TaskController::class, 'answer'])
      ->name('task_answer');
    Route::post('/task/start', [Student\TaskController::class, 'start'])
      ->name('task_start');

    Route::get('/timetable', [Student\TimetableController::class, 'index'])
      ->name('timetable');
    // Later we may add:
    Route::get('/some_page', [Student\SomeController::class, 'index'])
      ->name('some_page');
    Route::get('/another_page', [Student\AnotherController::class, 'index'])
      ->name('another_page');
  });
