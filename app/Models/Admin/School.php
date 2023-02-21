<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'recommended',
    ];

    public function course(){
        return $this->belongsTo(Courses::class, 'school', 'name');
    }
}
