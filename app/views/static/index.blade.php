@extends('home.layout')
@section('content')
<div id="Carousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#Carousel" data-slide-to="0" class="active"></li>
        <li data-target="#Carousel" data-slide-to="1"></li>
        <li data-target="#Carousel" data-slide-to="2"></li>
        <li data-target="#Carousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" style="margin-top: 50px;">
        <div class="item active">
            <div class="fill" style="background-image:url('/img/staticpages/back3.jpg');"></div>
        </div>
        <div class="item">
            <div class="fill" style="background-image:url('/img/staticpages/back2.jpg');"></div>
        </div>
        <div class="item">
            <div class="fill" style="background-image:url('/img/staticpages/back1.jpg');"></div>
        </div>
        <div class="item">
            <div class="fill" style="background-image:url('/img/staticpages/back4.jpg');"></div>
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
        <div class="col-lg-8 col-lg-offset-2">
            <h1>Welcome to Dex Caffery's Website</h1>
            <p>This is the homepage of software enthusiast Dexter Caffery. Feel free to look around my website as I add to it and implement
            new fun features, and test out new technologies in my free time, for the public to observe.</p>
            <p>Go ahead and register an account to check out the logged area. Also feel free to contact me if there is anything you would like
            to see added to this site, or if there are any bugs (which of course I didn't write).</p>
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