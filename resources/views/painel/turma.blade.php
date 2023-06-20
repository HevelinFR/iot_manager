 @extends('painel.main')

@section('content')

    <div class="wrapper-container">
        <div class="wrapper-header flex-container">
            <input type="search" name="" id="" placeholder="Pesquisar">
            <a href="adicionar-turma" class="btn"><img src="{{url('painel/img/add.png')}}" alt=""> Adicionar</a>
        </div>
        <table>
            <thead>
                <tr>
                <th>Código</th>
                <th>Semestre</th>
                <th>Disciplina</th>
                <th>Professor</th>
                <th>Alunos</th>
                <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($turmas as $turma)
                    <tr>
                    <td data-column="codigo">{{$turma->cod_turma}}</td>
                    <td data-column="semestre">{{$turma->semestre}}</td>
                    <td data-column="disciplina">{{$turma->disciplina->nome}}</td>
                    <td data-column="prof">{{$turma->professores->nome}}</td>
                    <td><a href="/turma/alunos/{{$turma->id}}"><img src="{{url('painel/img/View.png')}}"></a></td>
                    <td class="flex-container"><a href="/turma/edit/{{$turma->id}}"><img src="{{url('painel/img/Edit.png')}}"></a>

                        <form action="turma/{{$turma->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" href=""><img src="{{url('painel/img/delte.png')}}"></button>
                        </form>

                    </td>
                @endforeach
            </tbody>
            </table>

    </div>
@endsection




