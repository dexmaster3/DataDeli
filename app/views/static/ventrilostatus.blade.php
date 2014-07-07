@extends('home.layout')
@section('content')

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class="navbumper animated fadeInDown">
<div class="container" style="margin-top: 50px;margin-bottom: 50px;">
    <div class="row-fluid section">
        <div class="col-lg-5">
            <table id="basicInfoTable" class="table table-striped table-bordered table-hover dataTable">
                <thead>
                <tr>
                    <th colspan="2">Server Information</th>
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
            {{ $channel }}
                <a style="margin-top: 1em;" class="btn btn-primary" href="ventrilo://dexcaff.com:3784/servername=DexHouse">Click here to launch
                    Ventrilo and connect!</a>
        </div>

        <div class="row-fluid section">
            <div class="col-lg-12">
                <table id="userInfoTable" class="table table-striped table-bordered table-hover dataTable">
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
                        {{ $uservalue }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    </div>
@stop
@section('scripts')

@stop
