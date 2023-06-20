@extends('painel.main')

@section('content')
    <style>
        input{
            padding: 10px;
            border: 1px solid;
            margin-bottom: 20px
        }

        form{
            margin-top: 20px
        }

        form h3{
            margin-bottom: 15px
        }

        form .flex-container{
            gap: 40px
        }
    </style>
    <div class="wrapper-container">
        <h2>Hevelin de Jesus Freitas</h2>
        @if(isset($notas->id))
            <form action="/notas/update/{{$notas->id}}" method="POST">
                @csrf
                @method('PUT')
                <div>
                    <h3>Redes de Computadores</h3>
                    <div class="input-grup">
                        <label for="nota01">Avaliação 1</label>
                        <input type="text" name="nota01" value="{{$notas->nota01}}">
                    </div>

                    <div class="input-grup">
                        <label for="nota02">Avaliação 2</label>
                        <input type="text" name="nota02" value="{{$notas->nota02}}">
                    </div>

                    <div class="input-grup">
                        <label for="nota03">Avaliação 3</label>
                        <input type="text" name="nota03" value="{{$notas->nota03}}">
                    </div>
                </div>
                <div class="flex-container">
                    <button type="submit" class="btn">Salvar</button>
                    <a href="/turmas" class="btn red">Cancelar</a>
                </div>


            </form>
        @else
            <form action="/notas/adicionar_nota/{{$id_turma}}/{{$id_aluno}}" method="POST">
                @csrf
                <div>
                    <h3>Redes de Computadores</h3>
                    <div class="input-grup">
                        <label for="nota01">Avaliação 1</label>
                        <input type="text" name="nota01">
                    </div>

                    <div class="input-grup">
                        <label for="nota02">Avaliação 2</label>
                        <input type="text" name="nota02">
                    </div>

                    <div class="input-grup">
                        <label for="nota03">Avaliação 3</label>
                        <input type="text" name="nota03">
                    </div>
                </div>
                <div class="flex-container">
                    <button type="submit" class="btn">Salvar</button>
                    <a href="/turmas" class="btn red">Cancelar</a>
                </div>
            </form>
        @endif



    </div>
@endsection

