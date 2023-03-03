<?php

namespace App\Models\Admin;

use App\Models\Main\Cart;
use App\Models\Main\Coursereview;
use App\Models\Main\Online;
use App\Models\Main\Video;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'slug',
        'school',
        'learn',
        'audience',
        'requirement',
        'source',
        'url',
        'author',
        'tag',
        'description',
        'hour',
        'minute',
        'seconds',
        'material',
        'real_price',
        'ini_price',
        'image',
        'un_id',
        'status'
    ];

    public function course(){
        return $this->belongsTo(User::class, 'author', 'id');
    }

    public function about(){
        return $this->belongsTo(Describe::class, 'author', 'user_id');
    }

    public function topic(){
        return $this->hasMany(Topic::class);
    }

    public function lesson(){
        return $this->hasMany(Lesson::class);
    }


    public function video(){
        return $this->belongsTo(Video::class, 'id', 'course_id');
    }

    public function cart(){
        return $this->hasMany(Cart::class, 'course_id', 'id');
    }

    public function review(){
        return $this->hasMany(Coursereview::class, 'course_id', 'id');
    }

    // public function live()
    // {
    //     return $this->hasMany(Online::class, 'course_id', 'id');
    // }
}
