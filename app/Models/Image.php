<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    //relacion polimorfica uno a muchos
    public function img_propietario() //debe ser el msimo nombre del campo en la bd
    {
        return $this->morphTo('img_propietario', 'img_type', 'img_propietario', 'idimage');
    }
}
