<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Dispositivo;
use App\Models\Ambiente;
use App\Models\Regra;
use App\Models\Comparacao;
use Illuminate\Http\Request;

class DispositivosController extends Controller
{
    public function index()
    {
        // Obtém o usuário logado
        $user = Auth::user();

        // Obtém os dispositivos que possuem um ambiente relacionado ao usuário logado
        $dispositivos = Dispositivo::whereHas('ambiente', function ($query) use ($user) {
            $query->where('id_usuario', $user->id);
        })->get();

        return view('painel.dispositivos.list', ['dispositivos' => $dispositivos]);
    }

    public function redir_registration()
    {
        // Obtém o usuário logado
        $user = Auth::user();

        // Obtém os ambientes relacionados ao usuário logado
        $ambientes = Ambiente::where('id_usuario', $user->id)->get();

        $comparacoes = Comparacao::all();

        return view('painel.dispositivos.edit', compact('ambientes', 'comparacoes'));
    }

    public function store(Request $request)
    {
        /// Validação dos campos
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'id_ambiente' => 'required',
            'id_comparacao' => 'required',
            'valor_comparacao' => 'required'
        ]);

        // Criação da regra
        $regra = new Regra;
        $regra->id_comparacao = $request->id_comparacao;
        $regra->valor = $request->valor_comparacao;
        $regra->save();

        // Criação do dispositivo
        $dispositivo = new Dispositivo;
        $dispositivo->nome = $request->nome;
        $dispositivo->descricao = $request->descricao;
        $dispositivo->id_ambiente = $request->id_ambiente;
        $dispositivo->id_regra = $regra->id;

        // Salva o dispositivo
        $dispositivo->save();

        // Redireciona para a página de listagem de dispositivos
        return redirect()->route('dispositivos.index')->with('success', 'Dispositivo cadastrado com sucesso!');
    }

    public function edit($id)
    {
        // Obtém o dispositivo pelo ID
        $dispositivo = Dispositivo::with('regra')->find($id);

        // Verifica se o dispositivo existe
        if (!$dispositivo) {
            return redirect()->route('dispositivos.index')->with('error', 'Dispositivo não encontrado.');
        }

        // Verifica se o usuário logado tem permissão para editar o dispositivo
        if ($dispositivo->ambiente->id_usuario !== Auth::id()) {
            return redirect()->route('dispositivos.index')->with('error', 'Você não tem permissão para editar este dispositivo.');
        }

        // Obtém os ambientes do usuário logado para exibir no formulário
        $ambientes = Ambiente::where('id_usuario', Auth::id())->get();

        $comparacoes = Comparacao::all();

        return view('painel.dispositivos.edit', ['dispositivo' => $dispositivo, 'ambientes' => $ambientes, 'comparacoes' => $comparacoes]);
    }

    public function update(Request $request, $id)
    {
        // Validação dos dados de entrada
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'id_ambiente' => 'required|exists:ambientes,id',
            'id_regra' => 'required|exists:regras,id',
        ]);

        // Busca o dispositivo pelo ID
        $dispositivo = Dispositivo::findOrFail($id);

        // Atualiza os dados do dispositivo
        $dispositivo->nome = $validatedData['nome'];
        $dispositivo->descricao = $validatedData['descricao'];
        $dispositivo->id_ambiente = $validatedData['id_ambiente'];
        $dispositivo->id_regra = $validatedData['id_regra'];

        // Salva as alterações
        $dispositivo->save();

        // Redireciona para a página de listagem de dispositivos
        return redirect()->route('dispositivos.index')->with('success', 'Dispositivo atualizado com sucesso!');
    }

    public function destroy($id)
    {
        // Busca o dispositivo pelo ID
        $dispositivo = Dispositivo::findOrFail($id);

        // Exclui o dispositivo
        $dispositivo->delete();

        // Redireciona para a página de listagem de dispositivos
        return redirect()->route('dispositivos.index')->with('success', 'Dispositivo excluído com sucesso!');
    }
}
