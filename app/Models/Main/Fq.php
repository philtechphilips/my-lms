<?php

namespace App\Models\Main;

use App\Models\Admin\Courses;
use App\Models\Admin\Quiz;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fq extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'course_id', 'quiz_id']; 

    public function course(){
        return $this->belongsTo(Courses::class, 'course_id', 'id');
    }

    public function quiz(){
        return $this->belongsTo(Quiz::class, 'quiz_id', 'id');
    }
}
