<!DOCTYPE html>
<html lang="en-us">
<head>
@include('logged.head')
</head>
<body class="">
@include('logged.header')
@include('logged.navigation')
<!-- MAIN PANEL -->
<div id="main" role="main">
    <div id="content">
        @yield('content')
    </div>    <!--END CONTENT-->
</div>    <!--END MAIN PANEL-->

@include('logged.footer')
@yield('scripts')
</body>
</html>
