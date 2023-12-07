<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/png" href="/assets/images/favicon.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sorteio times</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css" />
    <script src="https://kit.fontawesome.com/9d463f10d9.js" crossorigin="anonymous"></script>
    @yield('header')
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid collapse-mobile">
            <div class="col-3 col-sm-3 col-lg-3 d-flex justify-content-center align-items-center">
                <div class="logo-margin">
                    <img src="/assets/images/complete_logo.svg" alt="Logo" height="40" class="d-inline-block align-top">
                </div>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center align-items-center" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-solid fa-user-plus"></i> Adicionar Jogadores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('game.new') }}"><i class="fa-solid fa-people-group"></i> Sortear times</a>
                    </li>
                </ul>
            </div>
            <div class="col-9 col-sm-6 col-lg-3 d-none d-lg-flex justify-content-center align-items-center">
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row mt-3 text-center">
            <div class="col">
                <span class="title">Sorteio times</span>
            </div>
        </div>
        @include('layouts.message')
        @yield('content')
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/assets/js/delete.js"></script>
    <script src="/assets/js/message.js"></script>
    @yield('script')
</body>

</html>