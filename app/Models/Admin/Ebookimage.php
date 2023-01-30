<?php

namespace App\Models\Admin;

use App\Models\Main\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ebookimage extends Model
{
    use HasFactory;
    protected $fillable = ['ebook_id', 'ebook_image'];
   
}
