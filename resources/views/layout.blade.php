<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Séries</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <style>
        .container {
            padding: 15px;
        }

        .menu {
            margin-bottom: 10px;
        }

        .btn {
            width: 150px;
        }

        .btn-sm {
            width: 40px;
        }

        .input-group.edit {
            width: 350px;
        }

        .form-control.edit {
            border-right: none;
            margin-top: 0px;
            height: 40px;
        }

        .btn.check {
            height: 40px;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }

        .row {
            margin-bottom: 10px;
        }

        .align {
            display: flex;
            align-items: center;
            justify-content: space-between
        }

        .align.edit {
            min-width: 420px;
        }

        .d-flex form {
            margin-left: 5px;
        }

        .series-empty {
            text-align: center;
            margin-top: 50px;
        }

        .navbar {
            padding: 10px;
        }

        .navbar .logiin {
            margin-right: 5px;
            text-decoration: none;
        }

        .navbar .login:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex justify-content-between">
        <a href="{{ route('series.index') }}" class="navbar-brand">Home</a>
        @auth
            <a href="{{ route('logout') }}" class="text-danger login">Sair</a>
        @endauth
        @guest
            <a href="{{ route('login.index') }}" class="login">Entrar</a>
        @endguest
    </nav>
    <div class="container">
        <div class="align menu">
            <h1>@yield('header')</h1>
            @yield('action-button')
        </div>
        
        @yield('content')
    </div>
</body>
</html>