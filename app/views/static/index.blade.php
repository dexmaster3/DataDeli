@extends('home.layout')
@section('content')
<div id="Carousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#Carousel" data-slide-to="0" class="active"></li>
        <li data-target="#Carousel" data-slide-to="1"></li>
        <li data-target="#Carousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" style="margin-top: 50px;">
        <div class="item active">
            <div class="fill" style="background-image:url('/img/staticpages/back3.jpg');"></div>
            <div class="carousel-caption">
                <h1 style="color: black;">Vision</h1>
            </div>
        </div>
        <div class="item">
            <div class="fill" style="background-image:url('/img/staticpages/back2.jpg');"></div>
            <div class="carousel-caption">
                <h1>Professionalism</h1>
            </div>
        </div>
        <div class="item">
            <div class="fill" style="background-image:url('/img/staticpages/back1.jpg');"></div>
            <div class="carousel-caption">
                <h1>Pure Joy</h1>
            </div>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#Carousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#Carousel" data-slide="next">
        <span class="icon-next"></span>
    </a>
</div>

<div class="animated fadeInDown">
<div class="container">
    <div class="row-fluid section">
        <div class="col-lg-12">
            <h1>The certified website of Dex Caffery</h1>
            <p>This is the homepage of software enthusiast Dexter Caffery</p>
        </div>
    </div>
</div>
</div>
<!-- /.container -->
@stop

@section('scripts')
<!-- Script to Activate the Carousel -->
<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
</script>

@stop