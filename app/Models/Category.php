<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id']; //menjaga field id saja untuk menambahkan secara cepat database Categori::create([])

    public function post() {
        return $this->hasMany(Post::class); //satu category banyak postingan
    }
}
