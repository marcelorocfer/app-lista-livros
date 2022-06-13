<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Livros') }}</title>

    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div>

        <main class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="my-5 text-center">
                            @if (Route::has('login'))
                                <div>
                                    @auth
                                        <div class="jumbotron">
                                            <h1 class="display-4 mb-4">App Lista Livros</h1>
                                            <div class="card text-center mb-4">
                                                <div class="card-body">
                                                    <a href="{{ route('books.index') }}" class="btn btn-lg shadow-none">Página de Listagem de Livros</a>
                                                    <i class="fas fa-book"></i>
                                                </div>
                                            </div>
                                            <div class="card text-center">
                                                <div class="card-body">
                                                    <a href="{{ route('weather') }}" class="btn btn-lg shadow-none">Veja o clima</a>
                                                    <i class="fas fa-cloud-bolt"></i>
                                                </div>
                                            </div>
                                        </div>
                                    @else

                                    <div class="jumbotron">
                                        <h1 class="display-4">App Lista Livros</h1>
                                        <p class="lead">Para acessar o App Lista Livros faça login ou cadastre-se.</p>
                                        <div class="card text-center mt-4">
                                            <div class="card-body">
                                                <a href="{{ route('login') }}" class="btn btn-lg shadow-none">Login</a>
                                            </div>
                                        </div>
                                    </div>

                                        @if (Route::has('register'))
                                            <div class="card text-center mt-4">
                                                <div class="card-body">
                                                    <a href="{{ route('register') }}" class="btn btn-lg shadow-none">Cadastrar</a>
                                                </div>
                                            </div>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                        </h1>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
