<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher;

Route::middleware(['auth', 'verified', 'role:4'])
  ->prefix('teacher')
  ->name('teacher.')
  ->group(function () {
    Route::get('/home', [Teacher\TimetableController::class, 'index'])
      ->name('timetable');

    Route::get('/result', [Teacher\TaskController::class, 'result'])
      ->name('result');

    Route::get('/task/pdf/{slug}', [Teacher\TaskController::class, 'exportPdf'])
      ->name('export_pdf');
    Route::get('/task/excel/{slug}', [Teacher\TaskController::class, 'exportExcel'])
      ->name('export_excel');

    Route::get('/task', [Teacher\TaskController::class, 'index'])
      ->name('task');
    Route::get('/task/create', [Teacher\TaskController::class, 'create'])
      ->name('task_create');
    Route::get('/task/{slug}', [Teacher\TaskController::class, 'edit'])
      ->name('task_edit');
    Route::get('/task/detail/{slug}', [Teacher\TaskController::class, 'detail'])
      ->name('task_detail');
    Route::post('/task/store', [Teacher\TaskController::class, 'store'])
      ->name('task_store');
    Route::post('/task/update', [Teacher\TaskController::class, 'update'])
      ->name('task_update');
    Route::post('/task/question/get', [Teacher\TaskController::class, 'question'])
      ->name('task_question');
    Route::post('/task/question/store', [Teacher\TaskController::class, 'questionStore'])
      ->name('task_question_store');
    Route::post('/task/import/store', [Teacher\TaskController::class, 'importStore'])
      ->name('import_store');
    Route::delete('/task/{id}', [Teacher\TaskController::class, 'delete'])
      ->name('task_delete');
  });
