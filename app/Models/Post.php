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
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'idcategorie','idcategorie');
    }

    //relacion muchos a muchos
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'idpost', 'idtag', 'idpost', 'idtag');
        // return $this->belongsToMany(Tag::class, 'post_tag', 'idpost', 'idtag');
    }

    //relacion uno a uno polimorfica
    public function image()
    {
        // dd($this->morphOne(Image::class, 'img_propietario','img_type','img_propietario','idpost')->toSql());
        return $this->morphOne(Image::class, 'img_propietario', 'img_type', 'img_propietario', 'idpost');
    }
}
