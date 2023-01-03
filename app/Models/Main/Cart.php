<?php

namespace App\Models\Main;

use App\Models\Admin\Courses;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'course_id', 'course_title', 'course_price', 'status'];

    public function cart(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function course(){
        return $this->belongsTo(Courses::class, 'course_id', 'id');
    }
}


