<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $primaryKey = 'idtag';
    protected $fillable = ['tag_name', 'tag_slug', 'tag_color'];

    public function getKeyName()
    {
        return "idtag";
    }

    // public function getRouteKeyName()
    // {
    //     return "tag_slug";
    // }

    //relacion muchos a muchos
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tag', 'idtag', 'idpost');
    }
}
