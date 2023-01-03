<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseImage extends Model
{
    use HasFactory;
    protected $fillable = ['course_id', 'course_image'];

    public function course_images(){
        return $this->belongsTo(Courses::class, 'course_id', 'id');
    }
}
