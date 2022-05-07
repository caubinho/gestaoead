<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spport extends Model
{
    use HasFactory;

    protected $fillable = ['status', 'descriptions', 'user_id', 'lesson_id'];
}
