@extends('painel.main')

@section('content')
    <div class="wrapper-container">
        <div class="wrapper-header flex-container">
            <input type="search" name="" id="" placeholder="Pesquisar">
        </div>
        <table>
            <thead>
                <tr>
                    <th>Matrícula</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                    </tr>
            </thead>
            <tbody>
                @foreach($turma->alunos as $aluno)
                    <tr>
                        <td data-column="matricula">{{$aluno->matricula}}</td>
                        <td data-column="nome">{{$aluno->nome}}</td>
                        <td data-column="email">{{$aluno->email}}</td>
                        <td class="flex-container"><a href="/notas/{{$turma->id}}/{{$aluno->id}}"><img src="{{url('painel/img/Edit.png')}}"></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>

    </div>
@endsection

