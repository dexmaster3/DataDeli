<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.head')
</head>
<body>
@include('home.navbar')

@yield('content')

@include('home.footer')
@yield('scripts')
</body>
</html>
