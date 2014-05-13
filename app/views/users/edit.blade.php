@extends('layouts.layout')
@section('content')

{{ HTML::ul($errors->all()) }}

{{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT'))}}

<div class="form-group">
    {{ Form::label('name', "Username") }}
    {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
</div>

<div class="form-group">
    {{ Form::label('email', "E-Mail (will be used for login)") }}
    {{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
</div>

<div class="form-group">
    {{ Form::label('password', "Password") }}
    {{ Form::password('password', Input::old('password'), array('class' => 'form-control')) }}
</div>

<div class="form-group">
    {{ Form::label('firstName', "First Name") }}
    {{ Form::text('firstName', $user->contact->firstName, array('class' => 'form-control')) }}
</div>

<div class="form-group">
    {{ Form::label('lastName', "Last Name") }}
    {{ Form::text('lastName', $user->contact->lastName, array('class' => 'form-control')) }}
</div>

<div class="form-group">
    {{ Form::label('phone', "Phone Number") }}
    {{ Form::text('phone', $user->contact->phone, array('class' => 'form-control')) }}
</div>

{{ var_dump($user) }}



{{ Form::submit('Create user!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop