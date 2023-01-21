<?php

namespace App\Http\Controllers\Home;

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

class HomeController extends Controller
{
  public function index()
  {
    $task = Task::where('is_active', 1)->get();

    return view('welcome', compact('task'));
  }
}