<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finish extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'course_id', 'topic_id', 'lesson_id'];
}
