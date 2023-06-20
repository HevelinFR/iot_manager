<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alunos extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function turmas(){

        return $this->belongsToMany('App\Models\Turmas');
    }
}