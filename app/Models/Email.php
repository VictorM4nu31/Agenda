<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Email extends Model
{
    use HasFactory;

    protected $fillable = ['correo', 'contacto_id'];

    // Relación con contacto (1:N inversa)
    public function contacto()
    {
        return $this->belongsTo(Contacto::class);
    }
}

