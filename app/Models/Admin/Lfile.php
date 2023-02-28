<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lfile extends Model
{
    use HasFactory;
    protected $fillable = ['lesson_id', 'file'];
}
