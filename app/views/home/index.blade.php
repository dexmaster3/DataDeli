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
            <div class="fill" style="background-image:url('{{ asset('img/staticpages/back1.jpg') }}');"></div>
            <div class="carousel-caption">
                <h1>Vision</h1>
            </div>
        </div>
        <div class="item">
            <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Two');"></div>
            <div class="carousel-caption">
                <h1>Professionalism</h1>
            </div>
        </div>
        <div class="item">
            <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Three');"></div>
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
<div class="container">
    <div class="row-fluid section">
        <div class="col-lg-12">
            <h1>The certified website of Dex Caffery</h1>
            <p>I currently work for a small company that has a variety of clients and projects being worked on at all times. I have been almost solely working on one of our larger products, LandRush. This web application helps real estate agents manage and market their listings, through mass mailing and custom landing pages. It also works as a lead generation system, allowing realtors to contact interested buyers.<br/>LandRush was based on the ASP.NET MVC framework, written in C#. Of course this ends up dealing with a great amount of JavaScript and HTML/CSS as well. We used SQL Server 2012 as our RDBMS, so writing SQL queries was an everyday occurrence.
                I have also done various projects using plain PHP, as well as the Laravel MVC framework which is always an enjoyable change of pace.<br/>I am always open to learning new technologies and languages. I have played around with Ruby on Rails, and done various things in Python, both of which I would love the chance to work with more extensively. I would love to work in a team setting where my contributions have a large impact on the final result. All that said, I began learning to code because of my passion for technology. I have loved it right from the start, and want to bring that enjoyment to my next job.</p>
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