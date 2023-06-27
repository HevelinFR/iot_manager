<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
  <div class="login">

    <div class="esquerda">
        <h1>Ciências da Computação</h1>
        <img src="{{url('painel/img/img1.png')}}" alt="Login">
    </div>

    <div class="direita">
         <!-- Validation Errors -->
         <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h1>Faça Seu Login</h1>
            <div>
                <label for="ususrio">Email</label><br>
                <input type="text" name="email">
            </div>
            <div>
                <label for="senha">Senha</label><br>
                <input type="password" name="password">
            </div>
            <button type="submit">Entrar</button>
        </form>
    </div>
</div>
</body>
</html>
