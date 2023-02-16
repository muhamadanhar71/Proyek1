<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory,Sluggable;

    

    // protected $filelable = ['title','excerpt','body']; 
    protected $guarded = ['id'];

    // untuk pemanggilan query postnya tabel category dan user kebawa fungsi with
    protected $with = ['category','user'];
    //akhir

    public function category(){
        return $this->belongsTo(Category::class); //mengambil dari model Category/Menghubungkan tabel post dengan tabel category

    }

    // versi pertama
    public function user(){
        return $this->belongsTo(User::class);
        //satu postingan hanya di miliki satu user jadi ga boleh satu postingan di tulis 2 user atau lebih
        //gunakan fungsi belongsto()
    }
    // akhir versi pertama

    // versi kedua
    // public function author(){
    //     return $this->belongsTo(User::class, 'user_id');
    // }
    // akhir versi kedua

    public function scopeFilter($query , array $carikomplex)
    {   
        // perintah untuk pencarian
        // versi callback
        $query->when($carikomplex['cari'] ?? false, function($query, $cari) {
            return $query->where(function($query) use ($cari) {
                   $query->where('title', 'like', '%' . $cari . '%')
                         ->orWhere('body', 'like', '%' . $cari . '%');
             });
         });
        // akhir perintah untuk pencarian
        $query->when($carikomplex['category'] ?? false, function($query, $category){
            return $query -> whereHas('category', function($query) use ($category){
                   $query -> where('slug', $category);
            });
        });
        // akhir versi callback

        // sama seperti di atas tapi menggunakan arrow function
        $query->when($carikomplex['user'] ?? false, fn($query, $user) =>
            $query -> whereHas('user', fn($query) =>
                $query -> where('username', $user)
            )
        );
    }
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    
}
