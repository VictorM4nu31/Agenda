<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Telefono extends Model
{
    use HasFactory;

    protected $fillable = ['numero', 'contacto_id'];

    // Relación con contacto (1:N inversa)
    public function contacto()
    {
        return $this->belongsTo(Contacto::class);
    }
}

