<?php

namespace App\Http\Controllers\Teacher;

use Excel;
use Validator;
use Exception;
use stdClass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Imports\ImportsQuestion;

use App\Models\Task;
use App\Helpers\Helpers;
use App\Models\Answer;
use App\Models\Question;

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
    $validator = Validator::make($request->all(), [
      'name' => 'required',
      'start_at' => 'required',
      'end_at' => 'required',
      'question_count' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json(['message' => strip_tags($validator->errors()->first()), 'status' => 400, 'data' => null], 200);
    }

    $task = new Task;

    $task->name = $request->name;
    $task->slug = Helpers::GenerateUUID();
    $task->start_at = Helpers::DateFormat($request->start_at);
    $task->end_at = Helpers::DateFormat($request->end_at);
    $task->question_count = $request->question_count;
    $task->save();

    return response()->json(["message" => "Berhasil menambahkan tes", "data" => $task, "status" => 200], 200);
  }

  public function edit($slug)
  {
    $task = Task::where('slug', $slug)->where('is_active', 1)->first();
    if (!$task) {
      abort(404);
    }

    $task->start_at = date('d/m/Y H:i', strtotime($task->start_at));
    $task->end_at = date('d/m/Y H:i', strtotime($task->end_at));

    return view('teacher.task.edit', compact('task'));
  }

  public function update(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required',
      'start_at' => 'required',
      'end_at' => 'required',
      'question_count' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json(['message' => strip_tags($validator->errors()->first()), 'status' => 400, 'data' => null], 200);
    }

    $task = Task::find($request->id);
    if (!$task) {
      return response()->json(['message' => "Something wrong", 'status' => 400], 200);
    }

    $task->name = $request->name;
    $task->start_at = Helpers::DateFormat($request->start_at);
    $task->end_at = Helpers::DateFormat($request->end_at);
    $task->question_count = $request->question_count;
    $task->save();

    return response()->json(["message" => "Berhasil merubah tes", "data" => $task, "status" => 200], 200);
  }

  public function delete($id)
  {
    $task = Task::find($id);
    if (!$task) {
      return response()->json(['message' => "Something wrong", 'status' => 400], 200);
    }

    $task->is_active = 0;
    $task->save();

    return response()->json(["message" => "Berhasil menghapus tes", "data" => $task, "status" => 200], 200);
  }

  public function detail($slug)
  {
    $task = Task::where('slug', $slug)->where('is_active', 1)->first();
    if (!$task) {
      abort(404);
    }

    return view('teacher.task.detail', compact('task'));
  }

  public function question(Request $request)
  {
    $question = Question::with(['answers'])
      ->where('task_id', $request->task_id)
      ->where('nomor', $request->nomor)
      ->first();

    return response()->json(["message" => "question found", "data" => $question, "status" => 200], 200);
  }

  public function questionStore(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'question' => 'required',
      'answertext1' => 'required',
      'answertext2' => 'required',
      'answertext3' => 'required',
      'answertext4' => 'required',
      'nomor' => 'required',
      'isTrue' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json(['message' => strip_tags($validator->errors()->first()), 'status' => 400, 'data' => null], 200);
    }

    $question = Question::where('task_id', $request->task_id)
      ->where('nomor', $request->nomor)
      ->first();

    if ($question) {
      $question->task_id = $request->task_id;
      $question->questions = $request->question;
      $question->nomor = $request->nomor;
      $question->save();
    } else {
      $question = new Question;

      $question->task_id = $request->task_id;
      $question->questions = $request->question;
      $question->nomor = $request->nomor;
      $question->save();
    }

    $answer1 = Answer::where('question_id', $question->id)
      ->where('alphabet', 'a')
      ->first();

    if ($answer1) {
      $answer1->alphabet = 'a';
      $answer1->answer = $request->answertext1;
      $answer1->is_true = $request->isTrue == 'a' ? true : false;
      $answer1->save();
    } else {
      $answer1 = new Answer;

      $answer1->question_id = $question->id;
      $answer1->alphabet = 'a';
      $answer1->answer = $request->answertext1;
      $answer1->is_true = $request->isTrue == 'a' ? true : false;
      $answer1->save();
    }

    $answer2 = Answer::where('question_id', $question->id)
      ->where('alphabet', 'b')
      ->first();

    if ($answer2) {
      $answer2->alphabet = 'b';
      $answer2->answer = $request->answertext2;
      $answer2->is_true = $request->isTrue == 'b' ? true : false;
      $answer2->save();
    } else {
      $answer2 = new Answer;

      $answer2->question_id = $question->id;
      $answer2->alphabet = 'b';
      $answer2->answer = $request->answertext2;
      $answer2->is_true = $request->isTrue == 'b' ? true : false;
      $answer2->save();
    }

    $answer3 = Answer::where('question_id', $question->id)
      ->where('alphabet', 'c')
      ->first();

    if ($answer3) {
      $answer3->alphabet = 'c';
      $answer3->answer = $request->answertext3;
      $answer3->is_true = $request->isTrue == 'c' ? true : false;
      $answer3->save();
    } else {
      $answer3 = new Answer;

      $answer3->question_id = $question->id;
      $answer3->alphabet = 'c';
      $answer3->answer = $request->answertext3;
      $answer3->is_true = $request->isTrue == 'c' ? true : false;
      $answer3->save();
    }

    $answer4 = Answer::where('question_id', $question->id)
      ->where('alphabet', 'd')
      ->first();

    if ($answer4) {
      $answer4->alphabet = 'd';
      $answer4->answer = $request->answertext4;
      $answer4->is_true = $request->isTrue == 'd' ? true : false;
      $answer4->save();
    } else {
      $answer4 = new Answer;

      $answer4->question_id = $question->id;
      $answer4->alphabet = 'd';
      $answer4->answer = $request->answertext4;
      $answer4->is_true = $request->isTrue == 'd' ? true : false;
      $answer4->save();
    }

    return response()->json(["message" => "Berhasil menambahkan pertanyaan", "status" => 200], 200);
  }

  public function importStore(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'file' => 'required|mimes:csv,xls,xlsx',
      'task_id' => 'required'
    ]);

    if ($validator->fails()) {
      return response()->json(['message' => strip_tags($validator->errors()->first()), 'status' => 400, 'data' => null], 200);
    }

    $file = $request->file('file');
    if ($file) {
      try {
        $data = new stdClass;
        $data->uniqid = uniqid();
        $data->id = $request->task_id;

        Excel::import(new ImportsQuestion($data), $file);
      } catch (Exception $e) {
        return response()->json(['message' => $e->getMessage(), 'status' => 400], 200);
      }
    }

    return response()->json(['message' => 'berhasil import', 'status' => 200], 200);
  }
}
