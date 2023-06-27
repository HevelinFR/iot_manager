<?php

namespace App\Http\Controllers;

use App\Models\Ambiente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AmbientesController extends Controller
{
    public function index(){

        $userId = Auth::id();
        $ambientes = Ambiente::where('id_usuario', $userId)->get();

        return view('painel.ambiente.list', ['ambientes' => $ambientes]);
    }

     public function store(Request $request)
    {
        // Validação dos campos
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
        ]);

        // Obtém o ID do usuário logado
        $userId = Auth::id();

        // Cria um novo ambiente
        $ambiente = new Ambiente();
        $ambiente->nome = $request->input('nome');
        $ambiente->descricao = $request->input('descricao');
        $ambiente->id_usuario = $userId;
        $ambiente->save();

        // Redireciona para a página de listagem de ambientes
        return redirect()->route('ambientes.index')->with('success', 'Ambiente cadastrado com sucesso.');
    }

    public function edit($id)
    {
        // Obtém o ambiente pelo ID
        $ambiente = Ambiente::find($id);

        // Verifica se o ambiente existe
        if (!$ambiente) {
            return redirect()->route('ambientes.index')->with('error', 'Ambiente não encontrado.');
        }

        // Verifica se o ambiente pertence ao usuário logado
        if ($ambiente->id_usuario !== Auth::id()) {
            return redirect()->route('ambientes.index')->with('error', 'Você não tem permissão para editar este ambiente.');
        }

        // Retorna a view de edição com o ambiente
        return view('painel.ambiente.edit', compact('ambiente'));
    }

    public function update(Request $request, $id)
    {
        // Validação dos campos
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
        ]);

        // Obtém o ambiente pelo ID
        $ambiente = Ambiente::find($id);

        // Verifica se o ambiente existe
        if (!$ambiente) {
            return redirect()->route('ambientes.index')->with('error', 'Ambiente não encontrado.');
        }

        // Verifica se o ambiente pertence ao usuário logado
        if ($ambiente->id_usuario !== Auth::id()) {
            return redirect()->route('ambientes.index')->with('error', 'Você não tem permissão para editar este ambiente.');
        }

        // Atualiza os campos do ambiente
        $ambiente->nome = $request->input('nome');
        $ambiente->descricao = $request->input('descricao');
        $ambiente->save();

        // Redireciona para a página de listagem de ambientes
        return redirect()->route('ambientes.index')->with('success', 'Ambiente atualizado com sucesso.');
    }
}
