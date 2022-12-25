<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Task;

class TaskController extends Controller
{
  public function index()
  {
    $task = Task::where('is_active', 1)->get();

    return view('teacher.task.index', compact('task'));
  }

  public function create()
  {
    return view('teacher.task.create');
  }

  public function store(Request $request)
  {
    Log::info(json_encode($request->all()));
    $task = new Task;
  }
}
