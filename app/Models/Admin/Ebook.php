<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    use HasFactory;
    protected $fillable = ['title',
    'slug',
    'school',
    'learn',
    'author',
    'tag',
    'description',
    'pages',
    'av_read_time',
    'real_price',
    'ini_price',
    'image'
];

public function user(){
    return $this->belongsTo(User::class, 'author', 'id');
}

public function user_details(){
    return $this->belongsTo(Describe::class, 'author', 'user_id');
}
}
