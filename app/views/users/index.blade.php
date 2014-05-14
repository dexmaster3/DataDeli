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

<a class="btn btn-success" href="{{ URL::to('users/create') }}">Create New User</a>
<table style="border-spacing: 5px;">
    <tr>
        <th>User Name</th>
        <th>User Id</th>
        <th>User Updated</th>
        <th>User Contact First Name</th>
        <th>Actions!!!</th>
    </tr>
    <?php echo $users ?>
@foreach($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->id }}</td>
        <td>{{ $user['updated_at'] }}</td>
        @foreach($user->subUsers as $subuser)
        <td style="background-color: indianred;">
            {{ $subuser->name }}
        </td>
            @foreach($subuser->subUsers as $dubsub)
            <td style="background-color: greenyellow">
                {{ $dubsub->name }}
            </td>
            @endforeach
        @endforeach
        <?php $rag = $user ?>
        <?php echo $rag ?>



        @while($user->subUsers->count() > 0)
        <span style="background-color: #00bfff;">dinguys dinguys<br>
        {{ $user->subUsers }}</span>
        <?php $user = $user->subUsers->first(); ?>
        @endwhile

        @if ($user->contact != null)
            <td>{{ $user->contact->firstName }}</td>
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
</table>
@stop