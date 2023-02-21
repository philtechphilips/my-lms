<?php

namespace App\Models\Main;


use App\Models\Admin\Question;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'course_id', 'quiz_id', 'quest_id', 'correct_answer', 'answer', 'point'];

    public function question(){
        return $this->belongsTo(Question::class, 'quest_id', 'id');
    }
}
