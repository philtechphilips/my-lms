<?php

namespace App\Models\Main;

use App\Models\Admin\Courses;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Online extends Model
{
    use HasFactory;
    protected $fillable = ['course_id', 'platform', 'date_time', 'url'];

    public function course(){
        return $this->belongsTo(Courses::class, 'course_id', 'id');
    }

    
}
