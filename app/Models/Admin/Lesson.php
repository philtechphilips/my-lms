<?php

namespace App\Models\Admin;

use App\Models\Main\Lvideo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'course_id', 'topic_id', 'source', 'url', 'duration', 'content', 'file'];

    public function video(){
        return $this->belongsTo(Lvideo::class, 'id', 'lesson_id');
    }
}
