<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grupo extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    // Relación con contactos (N:M)
    public function contactos()
    {
        return $this->belongsToMany(Contacto::class, 'contacto_grupo');
    }
}
