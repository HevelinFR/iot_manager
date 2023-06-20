<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Disciplina;

class DisciplinaController extends Controller
{
    // Resgatar todas as disciplinas
    public function index(){
        $disciplina = Disciplina::all();

        return view('painel.disciplina', ['disciplina' => $disciplina]);
    }

    //Salvar um disciplina
    public function store(Request $request){

        $disciplina = new Disciplina;

        $disciplina->cod_disciplina = $request->codigo;
        $disciplina->semestre = $request->semestre;
        $disciplina->nome = $request->nome;
        $disciplina->ementa = $request->ementa;

        $disciplina->save();

        return redirect('disciplina')->with('msg', 'Disciplina cadastrada com sucesso!');
    }

    //Resgatar uma disciplina e redirecionar para página de editar
    public function edit($id){
        $disciplina = Disciplina::findOrFail($id);

        return view('painel.editDisciplina', ['disciplina' => $disciplina]);
    }

    //Editar um disciplina
    public function update(Request $request){
        Disciplina::findOrFail($request->id)->update($request->all());

        return redirect('disciplina')->with('msg', 'Disciplina editada com sucesso!');
    }


    //Apagar um disciplina
    public function destroy($id){

        Disciplina::findOrFail($id)->delete();

        return redirect('disciplina')->with('msg', 'Disciplina deletada com sucesso!');

    }
}