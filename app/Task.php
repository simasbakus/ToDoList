<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  public $fillable = [
      'userId', 'task', 'isDone',
  ];
}
