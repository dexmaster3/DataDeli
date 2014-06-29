@extends('home.layout')
@section('content')
<div class="container">
    <div class="row-fluid section">
        <div class="col-lg-12">
            <h1>{{ $message['title'] }}</h1>
            <p>{{ $message['content'] }}</p>
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