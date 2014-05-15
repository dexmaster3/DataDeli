@extends('layouts.layout')
@section('content')
<style>
    table, th, td{
        border: 1px solid black;
        padding:2px;
    }
</style>

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<a class="btn btn-success" href="{{ URL::to('users/create') }}">Create New SubUser</a>
<table style="border-spacing: 5px;" id="userTable" class="table table-striped table-bordered table-hover dataTable">
    <thead>
    <tr>
        <th>Username</th>
        <th>Id #</th>
        <th>Updated</th>
        <th>Parent Account</th>
        <th>User Contact Full Name</th>
        <th>Actions!!!</th>
    </tr>
    </thead>
<tbody>
@foreach($users as $user)
    <tr id="user{{$user->id}}">
        <td>{{ $user->name }}</td>
        <td>{{ $user->id }}</td>
        <td>{{ $user['updated_at'] }}</td>
        <?php $parent = $user->parentUser() ?>
        <td>
            {{ $parent['email'] }}
        </td>

        @if ($user->contact != null)
            <td>{{ $user->contact->firstName }} {{ $user->contact->lastName }}</td>
        @else
            <td> </td>
        @endif

        <td>
            {{ Form::open(array('url' => 'users/' . $user->id, 'class' => 'pull-right')) }}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Delete this User', array('class' => 'btn btn-warning')) }}
            {{ Form::close() }}
            <a class="btn btn-small btn-success" href="{{ URL::to('users/' . $user->id) }}">Show this user</a>
            <a class="btn btn-small btn-info" href="{{ URL::to('users/' . $user->id . '/edit') }}">Edit this user</a>
        </td>
    </tr>
@endforeach
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#userTable').dataTable({
            "sPaginationType" : "bootstrap_full"
        });
    });
</script>
@stop