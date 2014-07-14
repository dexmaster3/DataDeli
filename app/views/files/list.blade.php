@extends('logged.layout')

@section('head')
{{ HTML::style('/css/dropzone/basic.css') }}
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
        <div class="span12 smart-form">
            <header>
                <h2>Your Uploaded Files<h2>
            </header>
            <br/>
            <ul>
                @foreach ($files as $file)
                <a href="{{ $file->location }}"><li>{{ $file->filename }}</li></a>
                @endforeach
            </ul>
        </div>
    </div>
</section>
@stop

@section('scripts')
{{ HTML::script('/js/dropzone/dropzone.min.js') }}
@stop