<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
  use HasFactory;

  protected $fillable = ['question_id', 'alphabet', 'answer', 'is_true', 'is_active', 'created_at', 'updated_at'];
}
