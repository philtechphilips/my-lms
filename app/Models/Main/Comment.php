<?php

namespace App\Models\Main;

use App\Models\Admin\Reply;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'course_id', 'lesson_id', 'comment'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function reply(){
        return $this->belongsTo(Reply::class, 'course_id', 'id');
    }
}
