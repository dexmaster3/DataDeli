@extends('home.layout')
@section('head')
{{ HTML::style('/css/datatables/dataTables.bootstrap.css') }}
@stop

@section('content')

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class="navbumper animated fadeInDown">
    <div class="container" style="margin-top: 50px;margin-bottom: 50px;">
        <div class="row-fluid section">
            <div class="col-lg-5 well">
                <h1>Server Information</h1>
                <table id="basicInfoTable" class="table table-hover dataTable">
                    <thead>
                    <tr>
                        <th>Item</th>
                        <th>Info</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($basic as $basickey => $basicvalue)
                    <tr>
                        <td>{{ $basickey }}</td>
                        <td>{{ $basicvalue }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-offset-1 col-lg-6 well">
                <h1>Server Layout</h1>
                {{ $channel }}
                <p><a style="margin-top: 1em;" class="btn btn-primary"
                   href="ventrilo://dexcaff.com:3784/servername=DexHouse">Click here to launch
                    Ventrilo and connect!</a></p>
                <p>For a password just <a href="/contact">contact me</a> we would love for you to join us in ventrilo!</p>
            </div>
        </div>

        <div class="row-fluid section">
            <div class="col-lg-12 well">
                <h1>Current Users</h1>
                <table id="userInfoTable" class="table table-hover dataTable">
                    <thead>
                    <tr>
                        @if(isset($user[0]))
                        @foreach($user[0] as $userkey => $uservalue)
                        <th>{{ $userkey }}</th>
                        @endforeach
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user as $usertable)
                    <tr>
                        @foreach($usertable as $userkey => $uservalue)
                        <td>
                            @if($userkey == "Name")
                            <img src="/img/staticpages/venticon_voiceoff.png"/>
                            @endif
                            {{ $uservalue }}
                        </td>
                        @endforeach
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row-fluid section">
            <div class="col-lg-12 well">
                <h1>Comment Archive</h1>
                <table id="userCommentsTable" class="table table-hover dataTable">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Comment</th>
                        <th>Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($vent_comments as $vent_comment)
                    <tr>
                        <td>{{ $vent_comment->name }}</td>
                        <td>{{ $vent_comment->comment }}</td>
                        <td>{{ $vent_comment->created_at }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('scripts')
{{ HTML::script('js/datatables/jquery.dataTables.min.js') }}
{{ HTML::script('js/datatables/dataTables.bootstrap.js') }}
<script>
    $(document).ready(function () {
        $('#userCommentsTable').dataTable({
            "order": [[2, "desc"]],
            "bFilter": false,
            "bLengthChange": false
        });
    });
</script>
@stop
