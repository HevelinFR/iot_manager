<h1>Alerta de Mudança de Dados do Sensor IoT</h1>

<p>Olá, {{$data['user_nome']}}</p>

<p>Este e-mail é para alertá-lo sobre uma mudança nos dados do sensor IoT.</p>

<p>O valor recebido do sensor é diferente do valor esperado. Detalhes da mudança:</p>
<ul>
    <li><strong>Sensor:</strong> {{$data['dispositivo_nome']}}</li>
    <li><strong>Valor Recebido:</strong> {{$data['valor_recebido']}}</li>
    <li><strong>Valor esperando não pode ser {{$data['comparacao']}}:</strong> {{$data['valor_esperado']}}</li>
    <li><strong>Data e Hora:</strong> {{$data['data_hora'] }}</li>
</ul>

<p>Por favor, verifique o sensor e tome as medidas necessárias.</p>

<p>Atenciosamente,</p>
<p>Equipe de Monitoramento IoT</p>