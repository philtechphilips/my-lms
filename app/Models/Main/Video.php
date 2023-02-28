<?php

namespace App\Models\Main;

use App\Models\Admin\Courses;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable = ['course_id', 'video'];
}
