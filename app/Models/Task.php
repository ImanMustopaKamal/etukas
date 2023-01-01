<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\Helpers;

class Task extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'slug', 'start_at', 'end_at', 'question_count', 'is_active'];
  protected $appends = ['minutes'];

  public function questions()
  {
    return $this->belongsTo('App\Models\Question', 'task_id', 'id');
  }

  public function getMinutesAttribute()
  {
    return Helpers::DateRange($this->start_at, $this->end_at);
  }
}
