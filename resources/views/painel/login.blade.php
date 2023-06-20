<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        body {
            background: #F9F9F9;
            font-family: 'Poppins', sans-serif;
            margin: 0;
        }
        .login{
            display: flex;
        }

        .esquerda{
            width: 50vw;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: black;
            color: white;
            font-size: 90%;
        }

        .direita{
            width: 50vw;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background-color: white;
            color: black;
            font-size: 90%;
        }

        .direita1{
            background-color: aqua;
        }


        h1 {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 170%;
            text-align: center;
        }

        img {
            width: 45%;
        }

        button{
            width: 15%;
            height: 5%;
            border: none;
            border-radius: 5px;
            margin-bottom: 7%;
            background: #2F9E41;
            margin-left: 15%;

        }

        input{
            width: 70%;
            height: 50%;
            margin-bottom: 7%;
            margin-left: 15%;
            border: 1px solid #000;
            border-radius: 10px;
            outline-color: #2F9E41;
            padding: 0 16px

        }

        label{
            margin-left: 15%;
        }

        a{
            color: #fff;
            text-decoration: none
        }

        @media only screen and (max-width: 850px) {
            .esquerda{
               display: none;

            }

            .direita{
                width: 100vw;
            }

            button{
                width: 80px;
            }

        }
    </style>
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
