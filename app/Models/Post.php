<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    //relacion uno a muchos inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //relacion muchos a muchos
    public function tags()
    {
        // return $this->belongsToMany(Tags::class);
        return $this->belongsToMany(Tags::class, 'post_tag', 'idpost', 'idtag');
    }

    //relacion uno a uno polimorfica
    public function image()
    {
        return $this->morphOne(Image::class, 'img_propietario');
    }
}