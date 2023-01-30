<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ebookfile extends Model
{
    use HasFactory;
    protected $fillable = ['ebook_id', 'ebook_files'];

    public function ebookfile(){
        return $this->belongsTo(Ebook::class, 'ebook_id', 'id');
    }
}
