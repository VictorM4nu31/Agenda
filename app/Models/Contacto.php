<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contacto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellidos', 'user_id'];

    // Relación con usuario (1:N inversa)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con notas
    public function notas()
    {
        return $this->hasMany(Nota::class);
    }

    // Relación con direcciones
    public function direcciones()
    {
        return $this->hasMany(Direccion::class);
    }

    // Relación con teléfonos
    public function telefonos()
    {
        return $this->hasMany(Telefono::class);
    }

    // Relación con emails
    public function emails()
    {
        return $this->hasMany(Email::class);
    }

    // Relación con grupos (N:M)
    public function grupos()
    {
        return $this->belongsToMany(Grupo::class, 'contacto_grupo');
    }
}

