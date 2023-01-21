<?php

namespace App\Imports;

use App\Models\Answer;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use App\Models\Question;

class ImportsQuestion implements ToCollection, WithHeadingRow
{
  private $data;

  public function __construct($data)
  {
    $this->data = $data;
  }

  public function collection(Collection $rows)
  {
    foreach ($rows as $row) {
      $question = Question::where('task_id', $this->data->id)
        ->where('nomor', $row['nomor'])
        ->first();

      if ($question) {
        $question->task_id = $this->data->id;
        $question->questions = $row['pertanyaan'];
        $question->nomor = $row['nomor'];
        $question->save();
      } else {
        $question = new Question;

        $question->task_id = $this->data->id;
        $question->questions = $row['pertanyaan'];
        $question->nomor = $row['nomor'];
        $question->save();
      }

      $answer1 = Answer::where('question_id', $question->id)
        ->where('alphabet', 'a')
        ->first();

      if ($answer1) {
        $answer1->alphabet = 'a';
        $answer1->answer = $row['pilihan_a'];
        $answer1->is_true = (strtolower($row['jawaban']) == '') ? false : ((strtolower($row['jawaban']) == 'a') ? true : false);
        $answer1->save();
      } else {
        $answer1 = new Answer;

        $answer1->question_id = $question->id;
        $answer1->alphabet = 'a';
        $answer1->answer = $row['pilihan_a'];
        $answer1->is_true = (strtolower($row['jawaban']) == '') ? false : ((strtolower($row['jawaban']) == 'a') ? true : false);
        $answer1->save();
      }

      $answer2 = Answer::where('question_id', $question->id)
        ->where('alphabet', 'b')
        ->first();

      if ($answer2) {
        $answer2->alphabet = 'b';
        $answer2->answer = $row['pilihan_b'];
        $answer2->is_true = (strtolower($row['jawaban']) == '') ? false : ((strtolower($row['jawaban']) == 'b') ? true : false);
        $answer2->save();
      } else {
        $answer2 = new Answer;

        $answer2->question_id = $question->id;
        $answer2->alphabet = 'b';
        $answer2->answer = $row['pilihan_b'];
        $answer2->is_true = (strtolower($row['jawaban']) == '') ? false : ((strtolower($row['jawaban']) == 'b') ? true : false);
        $answer2->save();
      }

      $answer3 = Answer::where('question_id', $question->id)
        ->where('alphabet', 'c')
        ->first();

      if ($answer3) {
        $answer3->alphabet = 'c';
        $answer3->answer = $row['pilihan_c'];
        $answer3->is_true = (strtolower($row['jawaban']) == '') ? false : ((strtolower($row['jawaban']) == 'c') ? true : false);
        $answer3->save();
      } else {
        $answer3 = new Answer;

        $answer3->question_id = $question->id;
        $answer3->alphabet = 'c';
        $answer3->answer = $row['pilihan_c'];
        $answer3->is_true = (strtolower($row['jawaban']) == '') ? false : ((strtolower($row['jawaban']) == 'c') ? true : false);
        $answer3->save();
      }

      $answer4 = Answer::where('question_id', $question->id)
        ->where('alphabet', 'd')
        ->first();

      if ($answer4) {
        $answer4->alphabet = 'd';
        $answer4->answer = $row['pilihan_d'];
        $answer4->is_true = (strtolower($row['jawaban']) == '') ? false : ((strtolower($row['jawaban']) == 'd') ? true : false);
        $answer4->save();
      } else {
        $answer4 = new Answer;

        $answer4->question_id = $question->id;
        $answer4->alphabet = 'd';
        $answer4->answer = $row['pilihan_d'];
        $answer4->is_true = (strtolower($row['jawaban']) == '') ? false : ((strtolower($row['jawaban']) == 'd') ? true : false);
        $answer4->save();
      }

      $answer5 = Answer::where('question_id', $question->id)
        ->where('alphabet', 'e')
        ->first();

      if ($answer5) {
        $answer5->alphabet = 'e';
        $answer5->answer = $row['pilihan_e'];
        $answer5->is_true = (strtolower($row['jawaban']) == '') ? false : ((strtolower($row['jawaban']) == 'e') ? true : false);
        $answer5->save();
      } else {
        $answer5 = new Answer;

        $answer5->question_id = $question->id;
        $answer5->alphabet = 'e';
        $answer5->answer = $row['pilihan_e'];
        $answer5->is_true = (strtolower($row['jawaban']) == '') ? false : ((strtolower($row['jawaban']) == 'e') ? true : false);
        $answer5->save();
      }
    }
  }
}
