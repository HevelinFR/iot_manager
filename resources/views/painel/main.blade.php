<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/6e1a7a7c25.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{url(mix('painel/css/style.css'))}}">
    <title>@yield('title')</title>
</head>

<body>

    <div class="box-menu">
        <div class="logo">
            <a href="home"><img src="{{url('painel/img/logo.png')}}" alt="Logo Ifbeg"></a>
        </div>
        <div class="iems-menu">
            <ul>
                <li><a href="/ambientes">Ambientes</a></li>

            </ul>
        </div>
    </div>

    <header>
        <div class="center">
            <div class="header-container flex-container">
                <div class="menu-btn">
                    <i class="fas fa-align-justify"></i>
                </div>
                <div class="loggout">
                    <div class="box-usuario flex-container">

                        <div class="nome-user">
                            <p>{{explode(' ',trim(Auth::user()->name))[0]}}<br></p>
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit"><i class="fas fa-sign-out-alt"></i><span>Sair</span></button>
                            </form>
                        </div>

                        <div class="avatar-usuario">
                            <img src="{{url('painel/img/avatar.png')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="content wrapper">
        @if(session('msg'))
            <p class="msg" id="alert">{{session('msg')}}</p>
        @endif

        @if(session('error'))
            <p class="erro" id="alert">{{session('error')}}</p>
        @endif
        @yield('content')
    </div>

<script>
    // setTimeout(() => {
    //     document.getElementById("alert").style.display = "none";
    // }, 2000); //depois de 3 segundos
</script>
</body>

</html>
