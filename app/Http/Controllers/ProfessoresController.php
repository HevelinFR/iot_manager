<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Professores;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;


class ProfessoresController extends Controller
{
    public function index(){
        $professores = Professores::all();

        return view('painel.professor', ['professores' => $professores]);
    }


    public function store(Request $request){


        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $professores = new Professores;

        $professores->matricula = $request->matricula;
        $professores->nome = $request->name;
        $professores->email = $request->email;

        $professor = $professores->create([
            'matricula' => $request->matricula,
            'nome' => $request->name,
            'email' => $request->email
        ]);

        //Criar usuário

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_usuario' => $professor->id, //id do professor
            'permissao' => User::PERMISSSAO_PROFESSOR
        ]);

        event(new Registered($user));

        return redirect('professor')->with('msg', 'Professor cadastrado com sucesso!');
    }

    public function edit($id){

        $professor = Professores::findOrFail($id);

        return view('painel.editProfessor', ['professor' => $professor]);
    }

    public function update(Request $request){


        Professores::findOrFail($request->id)->update($request->all());

        return redirect('professor')->with('msg', 'Professor editado com sucesso!');
    }



    public function destroy($id){



        Professores::findOrFail($id)->delete();

        return redirect('professor')->with('msg', 'Professor deletado com sucesso!');

    }
}
