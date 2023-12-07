<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>{{ $title }}</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">E ai, mano!</a>
            @auth
                <a href="{{ route('logout') }}">Sair</a>
            @endauth
            @guest
                <a href="{{ route('login') }}">Entrar</a>
            @endguest
        </div>
    </nav>
    <div class="container">
        <h1>{{ $title }}</h1>
        @isset($mensagemSucesso)
            <div class="alert alert-success">
                {{ $mensagemSucesso }}
            </div>
        @endisset
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{ $slot }}
    </div>
</body>
</html>
