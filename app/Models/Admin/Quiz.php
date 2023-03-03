<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = ['course_id', 'name', 'summary'];

    //A Topic Belongs to a Course
    public function course(){
        return $this->belongsTo(Courses::class, 'course_id', 'id');
    }
}
