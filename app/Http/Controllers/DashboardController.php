<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amostra;
use App\Models\Ambiente;
use App\Models\Comparacao;
use App\Models\Dispositivo;
use App\Models\Log;
use App\Models\Regra;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $userId = Auth::id();

        // $ambientes = Ambiente::where('id_usuario', $userId)->get();

        $ambientes = Ambiente::with('dispositivos.amostras')->where('id_usuario', $userId)->get();

        $msg =  $this->verificarNovosDados();

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

                $log->mensagem = $msg;
                $log->data_ultima_verificacao = now();
                $log->save();

                return $novosDados;
            }
        } else {
            $log->data_ultima_verificacao = now();
            $log->mensagem = 'Nenhum novo dado encontrado';
            $log->save();
            return $novosDados.$ultimaVerificacao;
        }
    }

    function processarNovoDado($dado)
    {

        $dispositivo = $this->getDispositivoById($dado->id_dispositivo);

        $comparacao = $this->getComparacaoById($dispositivo->regras->id_comparacao);

        $operador = $comparacao->operador;
        $amostra_valor = strval($dado->valor);
        $rega_value =  strval($dispositivo->regras->valor);

        $expressao = "\$amostra_valor $operador \$rega_value";
        $resultado = eval("return $expressao;");

        if ($resultado) {
            return "A expressão é verdadeira.";
        } else {
            return "A epressão é falsa";
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
}
