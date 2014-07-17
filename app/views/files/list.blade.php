@extends('logged.layout')

@section('head')
{{ HTML::style('/css/datatables/dataTables.bootstrap.css') }}
@stop

@section('content')

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<section id="widget-grid">
    <div class="jarviswidget jarviswidget-sortable" id="wid-id-0"
         data-widget-editbutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="{{ URL::to('/files') }}" class="button-icon" rel="tooltip" data-placement="bottom">&nbsp; <i
                        class="fa fa-plus"> Upload a File &nbsp; </i></a>
                <a href="#" class="button-icon jarviswidget-fullscreen-btn" rel="tooltip" data-placement="bottom"
                   data-original-title="Fullscreen"><i class="fa fa-resize-full"></i></a>
                <a href="#" class="button-icon jarviswidget-delete-btn" rel="tooltip" data-placement="bottom"
                   data-original-title="Delete"><i class="fa fa-times"></i></a>
            </div>
            <span class="widget-icon"><i class="fa fa-sitemap"></i></span>

            <h2>Files List</h2>
            <span class="jarviswidget-loader" style="display:none;"><i class="fa fa-refresh fa-spin"></i></span>
        </header>
        <div class="content">
            <div class="widget-body">
                    <table id="userFileTable" class="table table-striped table-bordered table-hover dataTable">
                        <thead>
                        <tr role="row">
                            <th>FileName</th>
                            <th>Visibility</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($files as $file)
                        <tr>
                            <td><a href="{{ $file->location }}">{{ $file->filename }}</a></td>
                            <td><button id='{{ "set-visible-" . $file->id }}' class="btn-primary btn">Set</button></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</section>
@stop

@section('scripts')
{{ HTML::script('js/datatables/jquery.dataTables.min.js') }}
{{ HTML::script('js/datatables/dataTables.bootstrap.js') }}
<script>
    $(document).ready(function () {
        $('#userFileTable').dataTable({
            "bFilter": false,
            "bLengthChange": false
        });
    });
</script>
@stop