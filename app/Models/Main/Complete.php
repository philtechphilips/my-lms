<?php

namespace App\Models\Main;

use App\Models\Admin\Topic;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complete extends Model
{
    use HasFactory;
    protected $fillable = ['course_id', 'lesson_id', 'topic_id', 'user_id'];

    public function topics(){
        return $this->belongsTo(Topic::class, 'topic_id', 'id');
    }
}
