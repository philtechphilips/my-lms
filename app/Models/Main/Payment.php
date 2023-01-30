<?php

namespace App\Models\Main;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = ['cart_id', 'course_id', 'course_type', 'user_id', 'reference_number', 'amount', 'status'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
