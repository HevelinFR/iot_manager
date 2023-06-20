@extends('painel.main')

@section('content')
    <div class="wrapper-container">
        <div class="wrapper-header flex-container">
            <input type="search" name="" id="" placeholder="Pesquisar">
            @if(Auth::user()->permissao == 0)
                <a href="adicionar-aluno" class="btn"><img src="{{url('painel/img/add.png')}}" alt=""> Adicionar</a>
            @endif
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
                @foreach($alunos as $aluno)
                    <tr>
                        <td data-column="matricula">{{$aluno->matricula}}</td>
                        <td data-column="nome">{{$aluno->nome}}</td>
                        <td data-column="email">{{$aluno->email}}</td>
                        <td class="flex-container"><a href="/alunos/edit/{{$aluno->id}}"><img src="{{url('painel/img/Edit.png')}}"></a>

                            <form action="alunos/{{$aluno->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" href=""><img src="{{url('painel/img/delte.png')}}"></button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>

    </div>
@endsection

