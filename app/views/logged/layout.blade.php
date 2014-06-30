<!DOCTYPE html>
<html lang="en-us">
<head>
@include('includes.head')
</head>
<body class="">
@include('includes.header')
@include('includes.navigation')
<!-- MAIN PANEL -->
<div id="main" role="main">
    <div id="content">
        @yield('content')
    </div>    <!--END CONTENT-->
</div>    <!--END MAIN PANEL-->

@include('includes.footer')
@yield('scripts')
</body>
</html>
