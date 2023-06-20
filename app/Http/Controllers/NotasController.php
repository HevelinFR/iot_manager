<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notas;
use App\Models\Alunos;
use App\Models\Turmas;
use Illuminate\Support\Facades\Auth;

class NotasController extends Controller
{

    public function index(){
        $aluno = Alunos::where('id', Auth::user()->id_usuario)->first();
        $notas = Notas::where('id_aluno', Auth::user()->id_usuario)->get();


        return view('painel.boletim', ['alunos' => $aluno, 'notas'=> $notas]);
    }

    public function edit($id_turma, $id_aluno){

        $notas = Notas::where('id_turma', $id_turma)
            ->where('id_aluno', $id_aluno)
            ->first();
        return view('painel.addNotas',[
            'notas' => $notas,
            'id_turma' => $id_turma,
            'id_aluno' => $id_aluno
        ]);

    }

    public function store(Request $request, $id_turma, $id_aluno){


        $notas = new Notas;

        $notas->id_turma = $id_turma;
        $notas->id_aluno = $id_aluno;
        $notas->nota01 = $request->nota01 ? $request->nota01 : 0;
        $notas->nota02 = $request->nota02 ?  $request->nota02 : 0;
        $notas->nota03 = $request->nota03 ? $request->nota03 : 0;
        $notas->save();

        return redirect('turmas')->with('msg', 'Nota adicionada com sucesso!');
    }

    public function update(Request $request){


        Notas::findOrFail($request->id)->update($request->all());

        return redirect('turmas')->with('msg', 'Nota adicionada com sucesso!');
    }
}
