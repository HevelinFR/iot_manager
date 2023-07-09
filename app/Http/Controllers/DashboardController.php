<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amostra;
use App\Models\Ambiente;
use App\Models\Comparacao;
use App\Models\Dispositivo;
use App\Models\Log;
use App\Models\Regra;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function index()
    {

        $userId = Auth::id();

        // $ambientes = Ambiente::where('id_usuario', $userId)->get();

        $ambientes = Ambiente::with('dispositivos.amostras')->where('id_usuario', $userId)->get();

        $msg =  $this->verificarNovosDados();

        // $msg = carbon::now();

        // Retorne a view com as amostras e seus dispositivos
        return view('painel.home', ['ambientes' => $ambientes, 'msg' => $msg]);
    }


    function verificarNovosDados()
    {

        $log = new Log();
        // Atualize a marcação de última verificação para o momento atual
        $ultimaVerificacao = $this->getDataUltimaVerificacao();

        // Realize a consulta no banco de dados para verificar se há novos dados inseridos
        $novosDados = Amostra::where('created_at', '>', $ultimaVerificacao)->get();


        if (!$novosDados->isEmpty()) {
            foreach ($novosDados as $dado) {
                echo $dado->valor . PHP_EOL;
                // Execute a função desejada com o novo dado
                $msg =  $this->processarNovoDado($dado);

                $log->mensagem = $msg.' Email enviado';
                $log->data_ultima_verificacao = carbon::now();
                $log->save();

                return $msg.' Email enviado';
            }
        } else {
            $log->data_ultima_verificacao = carbon::now();
            $log->mensagem = 'Nenhum novo dado encontrado';
            $log->save();
            return 'Nenhum novo dado encontrado';
        }
    }

    function processarNovoDado($dado)
    {

        $dispositivo = $this->getDispositivoById($dado->id_dispositivo);

        $comparacao = $this->getComparacaoById($dispositivo->regra->id_comparacao);

        $user = $this->getUserById($dispositivo->ambiente->id_usuario);

        $operador = $comparacao->operador;
        $amostra_valor = strval($dado->valor);
        $rega_value =  strval($dispositivo->regra->valor);

       $result = $this->fazerComparacao($operador, $amostra_valor, $rega_value);

        if ($result) {
            $data = [
                "dispositivo_nome" => $dispositivo->nome,
                "valor_recebido" => $amostra_valor,
                "comparacao" => $comparacao->descricao,
                "valor_esperado" => $rega_value,
                "data_hora" => \Carbon\Carbon::parse($dado->created_at)->format('d/m/Y H:i:s'),
                "user_nome" => $user->name,
                "user_email" => $user->email
            ];
            return Mail::send(new \App\Mail\newAlert($data));
        } else {
            return "A epressão é falsa ".$amostra_valor.$operador.$rega_value;
        }
    }

    function fazerComparacao($operador, $amostra, $valor) {
        switch ($operador) {
            case "==":
                return $amostra == $valor;
            case "!=":
                return $amostra != $valor;
            case ">":
                return $amostra > $valor;
            case ">=":
                return $amostra >= $valor;
            case "<":
                return $amostra < $valor;
            case "<=":
                return $amostra <= $valor;
            default:
                return false;
        }
    }
    

    function getDispositivoById($id)
    {

        return Dispositivo::with('regra')->find($id);
    }

    function getComparacaoById($id)
    {

        return Comparacao::find($id);
    }

    function getDataUltimaVerificacao()
    {
        // Obtém o último registro da tabela "log"
        $ultimoRegistro = Log::latest('id')->first();

        if ($ultimoRegistro) {
            // Se existir um registro, retorna a data da última verificação
            return $ultimoRegistro->data_ultima_verificacao;
        } else {
            // Se não houver registros, retorna a data e hora atual
            return Carbon::now();
        }
    }
    public function getUserById($id_user)
    {
        
        if(User::find($id_user))
            return User::find($id_user);
        return "Usuário não encontrado, ERRO 404";
    }
}
