@extends('logged.layout')
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

<a class="btn btn-success" href="{{ URL::to('offers/create') }}">Create New Offering</a>
<table style="border-spacing: 5px;">
    <tr>
        <th>Offer Name</th>
        <th>Network Id</th>
        <th>Offer Updated</th>
        <th>Subject Lines</th>
        <th>Actions!!!</th>
    </tr>
@foreach($offers as $offer)
    <tr>
        <td>{{ $offer->offerName }}</td>
        <td>{{ $offer->network_id }}</td>
        <td>{{ $offer['updated_at'] }}</td>
        <td>{{ $offer->subjectLines }}</td>


        <td>
            {{ Form::open(array('url' => 'offers/' . $offer->id, 'class' => 'pull-right')) }}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Delete this Offer', array('class' => 'btn btn-warning')) }}
            {{ Form::close() }}
            <a class="btn btn-small btn-success" href="{{ URL::to('offers/' . $offer->id) }}">Examine this Offer</a>
            <a class="btn btn-small btn-info" href="{{ URL::to('offers/' . $offer->id . '/edit') }}">Edit this Offer</a>
        </td>
    </tr>
@endforeach
</table>
@stop