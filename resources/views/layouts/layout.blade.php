<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Bootstrap CSS -->
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="{{ mix('css/app.css', 'core/public') }}" rel="preload" as="style"
    onload="this.onload=null;this.rel='stylesheet'">
<script src="{{ mix('js/app.js', 'core/public') }}" defer></script>


    <!-- Bootstrap Bundle with Popper -->
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <title>Registro de horas</title>
    

    @livewireStyles

</head>

<body>
    <header>
        
    </header>

    <main>
        @yield('content')
    </main>
    
    @livewireScripts
</body>

</html>