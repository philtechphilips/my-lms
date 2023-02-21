<?php

namespace App\Models\Main;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bcomment extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
