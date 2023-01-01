<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
  use HasFactory;

  protected $fillable = ['task_id', 'questions', 'nomor', 'is_active', 'created_at', 'updated_at'];

  public function answers() {
    return $this->hasMany('App\Models\Answer', 'question_id', 'id');
  }
}
