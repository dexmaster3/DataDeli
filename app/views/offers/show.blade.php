@extends('logged.layout')
@section('content')

<h1>Showing {{ $offer->offerName }}</h1>

<div class="jumbotron text-center">
    <h2>{{ $offer->offerName }}</h2>
    <p>
        <strong>Email:</strong> {{ $offer->network_id }}<br>
        <strong>Contact Info:</strong> {{ $offer->fromLine }}
    </p>
</div>

@stop