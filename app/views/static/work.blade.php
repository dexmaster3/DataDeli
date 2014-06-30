@extends('home.layout')
@section('content')
<div class="container animated fadeInDown">
    <div class="row-fluid section">
        <div class="col-lg-12">
            <h1>My Work</h1>
            <p>You can check out some of my work here. Also be sure to register for my logged section of the site.</p>
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