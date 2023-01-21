<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

use App\Models\Task;
use App\Models\UserAnswer;

class HomeController extends Controller
{
  public function index()
  {
    $task = Task::where('is_active', 1)
      ->where('start_at', '<=', $this->date)
      ->where('end_at', '>=', $this->date)
      ->get();

    foreach ($task as $item) {
      $item->is_answer = false;
      $answer = UserAnswer::where('user_id', Auth::user()->id)->first();
      if ($answer) {
        $item->is_answer = true;
      }
    }

    return view('student.home', compact('task'));
  }
}
