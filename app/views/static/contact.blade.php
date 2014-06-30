@extends('home.layout')
@section('content')
<div class="animated fadeInDown">
<div class="container">
    <div class="row-fluid section">
        <div class="col-lg-12">
            <h1>Channels of Communication</h1>
            <p>You can contact me using any of the following methods:</p>
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