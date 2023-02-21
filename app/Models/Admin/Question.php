<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = ['course_id', 'quest_number', 'quiz_id', 'question', 'point', 'description', 'option_a', 'option_b', 'option_c', 'option_d', 'c_option'];

    public function quiz(){
        return $this->belongsTo(Quiz::class, 'quiz_id', 'id');
    }
}
