<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function turma() {
        return $this->belongsTo(Turmas::class);
      }
}