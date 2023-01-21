<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

use App\Models\Task;
use App\Models\Question;
use App\Models\UserAnswer;
use App\Models\UserTask;

class TaskController extends Controller
{
  public $date;

  public function  __construct()
  {
    $this->date = date_create()->format('Y-m-d H:i');
  }

  public function index()
  {
    $task = Task::with(['userTask' => function($q) {
      $q->where('user_id', Auth::user()->id);
    }])
      ->where('is_active', 1)
      ->where('start_at', '<=', $this->date)
      ->where('end_at', '>=', $this->date)
      ->get();
    
    return view('student.home', compact('task'));
  }

  public function detail($slug)
  {
    $task = Task::with(['userTask' => function($q) {
      $q->where('user_id', Auth::user()->id);
    }])
      ->where('is_active', 1)
      ->where('slug', $slug)
      ->where('start_at', '<=', $this->date)
      ->where('end_at', '>=', $this->date)
      ->first();

    if (!$task) {
      abort(404);
    }

    return view('student.task', compact('task'));
  }

  public function dataDetail($task_id)
  {
    $question = Question::where('task_id', $task_id)->get();
    
    foreach($question as $item) {
      $item->is_answer = false;
      $item->not_sure = false;

      $userAnswer = UserAnswer::where('user_id', Auth::user()->id)
        ->where('question_id', $item->id)
        ->first();

      if($userAnswer) {
        $item->is_answer = true;
        $item->not_sure = $userAnswer->not_sure;
      }
    }

    return response()->json(['message' => 'success', 'data' => $question, 'status' => 200], 200);
  }

  public function question(Request $request)
  {
    $question = Question::with(['answers' => function($q) {
      $q->orderBy('alphabet', 'ASC');
    }])->where('task_id', $request->task_id)
      ->where('nomor', $request->nomor)
      ->first();
    
    foreach($question->answers as $answer) {
      $answer->is_answer = false;
      $answer->not_sure = false;
      $userAnswer = UserAnswer::where('user_id', Auth::user()->id)
        ->where('answer_id', $answer->id)
        ->where('question_id', $question->id)
        ->first();

      if($userAnswer) {
        $answer->is_answer = true;
        $answer->not_sure = $userAnswer->not_sure;
      }
    }
    return response()->json(["message" => "question found", "data" => $question, "status" => 200], 200);
  }

  public function answer(Request $request)
  {
    $userAnswer = UserAnswer::where('user_id', Auth::user()->id)
      ->where('task_id', $request->task_id)
      ->where('question_id', $request->question_id)
      ->first();

    if($userAnswer) {
      $userAnswer->answer_id = $request->answer;
      $userAnswer->not_sure = isset($request->not_sure) ? true: false;
      $userAnswer->save();
    }else{
      $userAnswer = new UserAnswer;

      $userAnswer->user_id = Auth::user()->id;
      $userAnswer->task_id = $request->task_id;
      $userAnswer->question_id = $request->question_id;
      $userAnswer->answer_id = $request->answer;
      $userAnswer->not_sure = isset($request->not_sure) ? true: false;
      $userAnswer->save();
    }

    return response()->json(["message" => "question found", "status" => 200], 200);
  }

  public function start(Request $request)
  {
    $userTask = UserTask::where('task_id', $request->task_id)
      ->where('user_id', Auth::user()->id)
      ->first();

    if(!$userTask) {
      $userTask = new UserTask;

      $userTask->task_id = $request->task_id;
      $userTask->user_id =  Auth::user()->id;
      $userTask->save();
    }
    
    return response()->json(["message" => "Start task", "status" => 200], 200);
  }
}
