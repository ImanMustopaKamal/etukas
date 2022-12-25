<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'slug', 'start_at', 'end_at', 'is_active'];

  public function questions() {
    return $this->belongsTo('App\Models\Question', 'task_id', 'id');
  }
}
