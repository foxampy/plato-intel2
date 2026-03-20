<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    @yield('title')
    @yield('description')
    
    <!-- Favicon -->
    <link rel="icon" href="{{asset('i/favicon.png')}}" type="image/png">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/neomorph-complete.css')}}">
    
    @stack('styles')
</head>
<body class="neomorph-theme">
    @include('common.header-neomorph')
    
    <main>
        @yield('content')
    </main>
    
    @include('common.footer-neomorph')
    @include('parts.telegram-button')
    
    @stack('scripts')
</body>
</html>
