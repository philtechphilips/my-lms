<?php

namespace App\Models\Main;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ebookreview extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'user_id', 'ebook_id', 'status'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
