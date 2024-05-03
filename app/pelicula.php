<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pelicula extends Model
{
    protected $fillable = ['nombre', 'clasificacion', 'lanzamiento', 'resena', 'temporada'];

    public function personaje() {
        return $this->hasMany(Personaje::class);
    }
}
