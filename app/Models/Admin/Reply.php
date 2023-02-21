<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    protected $fillable = ['course_id', 'lesson_id', 'user_id', 'comment'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
