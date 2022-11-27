<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intro_video extends Model
{
    use HasFactory;
    protected $fillable = ['source', 'url'];
}
