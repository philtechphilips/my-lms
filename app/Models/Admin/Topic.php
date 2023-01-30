<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    protected $table = 'topics';
    protected $primaryKey = 'id';

    protected $fillable = ['course_id', 'name', 'summary', 'course_uid'];

    //A Topic Belongs to a Course
    public function course(){
        return $this->belongsTo(Courses::class);
    }

    public function lesson(){
        return $this->hasMany(Lesson::class);
    }
}
