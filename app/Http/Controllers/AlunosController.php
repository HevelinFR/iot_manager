<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Alunos;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class AlunosController extends Controller
{
    public function index(){
        $alunos = Alunos::all();

        return view('painel.aluno', ['alunos' => $alunos]);
    }


    public function store(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $aluno = new Alunos;

        $aluno->matricula = $request->matricula;
        $aluno->nome = $request->name;
        $aluno->email = $request->email;

        $alunonovo = $aluno->create([
            'matricula' => $request->matricula,
            'nome' => $request->name,
            'email' => $request->email
        ]);

        //Criar usuário

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_usuario' => $alunonovo->id, //id do aluno
            'permissao' => User::PERMISSSAO_ALUNO
        ]);

        event(new Registered($user));


        return redirect('alunos')->with('msg', 'Aluno cadastrado com sucesso!');
    }

    public function edit($id){
        $aluno = Alunos::findOrFail($id);
            return view('painel.editAluno', ['aluno' => $aluno]);


    }

    public function update(Request $request){
        Alunos::findOrFail($request->id)->update($request->all());

        return redirect('alunos')->with('msg', 'Aluno editado com sucesso!');
    }



    public function destroy($id){

        Alunos::findOrFail($id)->delete();

        return redirect('alunos')->with('msg', 'Aluno deletado com sucesso!');

    }
}