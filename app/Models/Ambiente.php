<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambiente extends Model
{
    use HasFactory;

    protected $fillabel = [
        'nome',
        'descricao',
        'id_usuario'
    ];


    public function dispositivos()
    {
        return $this->hasMany(Dispositivo::class, 'id_ambiente');
    }
    
}
