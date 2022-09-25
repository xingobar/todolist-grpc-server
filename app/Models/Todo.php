<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $table = 'todolist';

    protected $fillable = [
      'title', 'name', 'is_complete'
    ];

    protected $casts = [
      'is_complete' => 'boolean'
    ];
}
