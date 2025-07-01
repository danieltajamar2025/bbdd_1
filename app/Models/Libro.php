<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Libro extends Model
{
    protected $table = 'libros';

    protected $fillable = ['titulo', 'autor', 'anio_publicacion', 'disponible'];

    // Un libro puede estar en muchos préstamos
    public function prestamos(): HasMany
    {
        return $this->hasMany(Prestamo::class, 'libro_id');
    }
}
