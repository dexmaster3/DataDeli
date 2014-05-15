@extends('layouts.layout')
@section('content')

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'users')) }}

<div class="form-group">
{{ Form::label('name', "Username (Just for display)") }}
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
    {{ Form::text('firstName', Input::old('firstName'), array('class' => 'form-control')) }}
</div>

<div class="form-group">
    {{ Form::label('lastName', "Last Name") }}
    {{ Form::text('lastName', Input::old('lastName'), array('class' => 'form-control')) }}
</div>

<div class="form-group">
    {{ Form::label('phone', "Phone Number") }}
    {{ Form::text('phone', Input::old('phone'), array('class' => 'form-control')) }}
</div>



{{ Form::submit('Create user!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop