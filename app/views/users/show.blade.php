@extends('layouts.layout')
@section('content')

<h1>Showing {{ $user->name }}</h1>

<div class="jumbotron text-center">
    <h2>{{ $user->name }}</h2>
    <p>
        <strong>Email:</strong> {{ $user->email }}<br>
        <strong>Contact Info:</strong> {{ $user->contact->id }}
    </p>
</div>

@stop