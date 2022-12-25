<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
  use HasFactory;

  protected $fillable = ['task_id', 'questions'];

  public function answers() {
    return $this->belongsTo('App\Models\Answer', 'question_id', 'id');
  }
}
