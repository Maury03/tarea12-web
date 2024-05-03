<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class personaje extends Model
{
    protected $fillable = ['nombre', 'pelicula', 'imagen', 'descripcion'];

    public function pelicula() {
        return $this->belongsTo(Pelicula::class);
    }
}
