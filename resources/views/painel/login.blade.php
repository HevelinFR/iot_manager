<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{url(mix('painel/css/bootstrap.css'))}}">
    <link rel="stylesheet" href="{{url(mix('painel/css/style.css'))}}">
    <title>Login</title>
</head>

<body>
    <div class="login container">

        <div class="bg-body col-lg-6 rounded-4" style="padding: 30px;">
            <img class="mb-3" src="{{url('painel/img/logo.png')}}" alt="Login">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form method="POST" action="{{ route('login') }}" class="col-lg-12">
                @csrf
                <h3 class="text">Faça Seu Login</h3>
                <div class="form-group py-3 m-0">
                    <label for="ususrio">Email</label><br>
                    <input type="text" name="email" class="form-control">
                </div>
                <div class="form-group py-3">
                    <label for="senha">Senha</label><br>
                    <input type="password" name="password" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3">Entrar</button>
                <a href="/register">Cadastre-se</a>
            </form>
        </div>
    </div>


</body>