<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Turmas;
use App\Models\Alunos;
use App\Models\AlunosTurmas;

class AlunosTurmasController extends Controller
{
    public function index(){
        $turmas = Turmas::with('professores', 'disciplina')->get();
        $alunos = Alunos::all();

        return view('painel.matricula', ['turmas' => $turmas, 'alunos' => $alunos]);
    }

    public function store(Request $request){

        $alunoTurma = new AlunosTurmas;

        $alunoTurma->turmas_id = $request->turma_id;
        $alunoTurma->alunos_id = $request->aluno_id;

        $alunoTurma->save();
        return redirect('matricula')->with('msg', 'Aluno matriculado com sucesso!');

    }
}