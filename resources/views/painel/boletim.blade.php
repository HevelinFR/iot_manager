@extends('painel.main')

@section('content')

<style>
    .aprovado{
        background: #2F9E41;
        color: #fff;
        padding: 4px;
        border-radius: 10px
    }

    .reprovado{
        background-color: #f53545;
        color: #fff;
        padding: 4px;
        border-radius: 10px
    }

    .wrapper-container tbody td {
        border: 1px solid;
    }
</style>

<div class="wrapper-container">
    <div>
        <h2>{{$alunos->nome}}</h2>
        <div>
            <p>Matricula: {{$alunos->matricula}}</p>
            <p>E-mail: {{$alunos->email}}</p>
        </div>

    </div>
    <table>
        <thead>
            <tr>
                <th>Turma</th>
                <th>Nota 01</th>
                <th>Nota 02</th>
                <th>Nota 04</th>
                <th>Situação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notas as $nota)
                <tr>
                    <td>{{$nota->turma->disciplina->nome}}</td>
                    <td>{{$nota->nota01}}</td>
                    <td>{{$nota->nota02}}</td>
                    <td>{{$nota->nota03}}</td>
                    <td>
                        @if(($nota->nota01+$nota->nota02+$nota->nota03)/3 >= 7)
                            <span class="aprovado">Aprovado</span>
                        @else
                            <span class="reprovado">Reprovado</span>
                        @endif

                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>


</div>
@endsection

