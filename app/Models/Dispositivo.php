<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Dispositivo extends Model
{
    use HasFactory;

    protected $fillabel = [
        'nome',
        'descricao',
        'id_ambiente',
        'id_regra'
    ];

    // Definindo a relação com o modelo Ambiente
    public function ambiente()
    {
        return $this->belongsTo(Ambiente::class, 'id_ambiente');
    }

    // Definindo a relação com o modelo Regra
    public function regra()
    {
        return $this->belongsTo(Regra::class, 'id_regra');
    }

    public function amostras()
    {
        return $this->hasMany(Amostra::class, 'id_dispositivo');
    }
}
