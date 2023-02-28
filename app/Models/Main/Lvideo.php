<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lvideo extends Model
{
    use HasFactory;
    protected $fillable = ['lesson_id', 'video']; 
}
