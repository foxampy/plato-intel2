<!DOCTYPE html>
<html>
@include('common.head')
<body class="neomorph-theme">
<div class="b-wrapper {{$wrapperClass ?? ''}}">
    @include('common.header')

    @yield('content')
    
    @include('common.footer')
</div>
</body>
</html>
