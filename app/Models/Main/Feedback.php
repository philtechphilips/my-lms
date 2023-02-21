<?php

namespace App\Models\Main;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = "feedbacks";
    protected $fillable = ['user_id', 'feedback'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
