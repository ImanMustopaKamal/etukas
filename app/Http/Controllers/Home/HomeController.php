<?php

namespace App\Http\Controllers\Home;

use Excel;
use Validator;
use Exception;
use stdClass;
use Carbon\Carbon;

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
  public $date;

  public function  __construct()
  {
    $this->date = date_create()->format('Y-m-d H:i');
  }

  public function index()
  {
    $task = Task::where('is_active', 1)
      ->where('start_at', '<=', $this->date)
      ->where('end_at', '>=', $this->date)
      ->get();

    return view('welcome', compact('task'));
  }
}