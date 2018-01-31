<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
        
        {{Html::script('js/pay.js')}}

    </head>
    <body>
        <div id="app">
            <div id="navigation-bar">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="{{url('/pay')}}">PAY</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('cuentacobro.index')}}">Cuentas de Cobro <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('cliente.index')}}">Clientes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('tiposervicio.index')}}">Tipos de Servicios</a>
                            </li>
                            </ul>
                            <ul class="navbar-nav navbar-right">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/pay/logout">Salir</a>
                                    </div>
                                </li>
                            </ul>
                    </div>
                </nav>
            </div>

            <div id="content" style="height: 83vh; display: flex; justify-content: center; align-items: center; position: relative;">
                <div class="card col-lg-8">
                    <div class="card-title">
                        <label><h3>@yield('title_section','Titulo de Seccion')</h3></label>
                    </div>
                    <div class="card-body">
                        @include('flash::message')
                        @yield('content','conenido de la seccion')
                    </div>
                </div>
            </div>
            <div id="footer" class="navbar navbar-expand-lg navbar-light bg-light" style="width: 100%;position:absolute; float:bottom;display:inline-block; overflow:hidden;">
                <div style="float: left;">
                    <p class="">Todos los derechos resservados &copy {{date('Y')}}</p>
                </div>
                <div style="float: right;">
                    <p class=""><b>Juan Diego Tonguino</b></p>
                </div>
            </div>
        </div>
    </body>
    <div id="deleteDialog" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="modalText">Modal body text goes here.</p>
                </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" id="delete">Eliminar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
</html>