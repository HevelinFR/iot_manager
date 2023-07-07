<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amostra extends Model
{
    use HasFactory;

    protected $fillabel = [
        'id',
        'valor',
        'data',
        'hora',
        'id_dispositivo'
    ];

     // Definindo a relação com o modelo Dispositivo
     public function dispositivo()
     {
         return $this->belongsTo(Dispositivo::class, 'id_dispositivo');
     }
}
