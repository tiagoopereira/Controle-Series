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

        .delete {
            width: 60px;
        }
        .form-group {
            margin-bottom: 10px;
        }

        .align {
            display: flex;
            align-items: center;
            justify-content: space-between
        }

        .series-empty {
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="align menu">
            <h1>@yield('header')</h1>
            @yield('add-button')
        </div>
        
        @yield('content')
    </div>
</body>
</html>