<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turmas extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function alunos(){

        return $this->belongsToMany(Alunos::class);
    }

    public function professores(){
        return $this->belongsTo(Professores::class);
    }

    public function disciplina(){
        return $this->belongsTo(Disciplina::class);
    }
}
