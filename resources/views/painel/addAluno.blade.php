@extends('painel.main')

@section('content')

<div class="wrapper-container">
     <!-- Validation Errors -->
     <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <form class="form" action="/adicionar-aluno" method="POST">
        @csrf
        <h1>Adicionar Aluno</h1>
            <div class="input-grup">
                <div  class="input-box">
                    <label for="matricula">Matrícula</label><br>
                    <input id="matricula" name="matricula" type="text" placeholder="Matrícula" required>
                    <label for="name">Nome</label><br>
                    <input id="name" name="name" type="text" placeholder="Nome" required>
                    <label for="email">Email</label><br>
                    <input id="email" name="email" type="text" placeholder="Email" required>


                     <!-- Password -->
                     <div class="mt-4">
                        <x-label for="password" :value="__('Password')" />

                        <x-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-input id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required />
                    </div>

                </div>
            </div>

            <div class="button flex-container">
                <div>
                    <button type="submit"  class="btn">Salvar</button>
                </div>
                <div>
                    <a href="/alunos" class="btn red">Cancelar</a>
                </div>
            </div>
    </form>

</div>
@endsection

