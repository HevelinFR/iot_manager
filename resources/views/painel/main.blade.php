<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/6e1a7a7c25.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{url(mix('painel/css/bootstrap.css'))}}">
    <link rel="stylesheet" href="{{url(mix('painel/css/style.css'))}}">
    <title>@yield('title')</title>
</head>

<body>

    <div class="box-menu">
        <div class="d-flex flex-column flex-shrink-0 p-3">
            <a href="home" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none logo">
                <img src="{{url('painel/img/logo.png')}}" alt="Logo Ifbeg" width="200">
            </a>
            <hr>

            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item"><a class="nav-link active" href="/home"><i class="fas fa-fw fa-tachometer-alt"></i> Dashboard</a></li>
                <li class="nav-item"><a class="nav-link link-dark" href="/ambientes"><i class="fas fa-city"></i> Ambientes</a></li>
                <li class="nav-item"><a class="nav-link link-dark" href="/dispositivos"><i class="fas fa-laptop-house"></i> Dispositivos</a></li>
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



    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.0/chart.min.js" integrity="sha512-mlz/Fs1VtBou2TrUkGzX4VoGvybkD9nkeXWJm3rle0DPHssYYx4j+8kIS15T78ttGfmOjH0lLaBXGcShaVkdkg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <script>
        // setTimeout(() => {
        //     document.getElementById("alert").style.display = "none";
        // }, 2000); //depois de 3 segundos
    </script>
</body>

</html>