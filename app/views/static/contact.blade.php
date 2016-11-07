@extends('home.layout')
@section('content')
<div class="navbumper animated fadeInDown">
<div class="container">
    <div class="row-fluid section">
        <div class="col-lg-12">
            <h1>Channels of Communication</h1>
            <p>Feel free to contact me using any of the following methods</p><br/>
            <h5>Email: {{ HTML::image('img/dexemail.png') }}</a></h5>
            <h5>Telephone: {{ HTML::image('img/phone.png') }}</h5>
            <h5>Postcard: 40 Percy Street, Charleston, SC 29403</h5>
            <h5>Fax Machine: 1-823-352-7647</h5>
            <h5>CB Radio: Channel 38 - 27.385 MHz (Unofficial SSB calling channel, LSB mode)</h5>
            <h5>Ham Radio: 144.20000, BM, 2meterSSB Ham, USB modulation </h5>
            <h5>Instagram: Coming soon</h5>
        </div>
    </div>
</div>
    </div>
<!-- /.container -->
@stop

@section('scripts')

@stop
