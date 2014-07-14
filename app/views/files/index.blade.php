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
            <span class="widget-icon"><i class="fa fa-sitemap"></i></span>

            <h2>File Upload</h2>
            <span class="jarviswidget-loader" style="display:none;"><i class="fa fa-refresh fa-spin"></i></span>
        </header>
        <div class="span6 tree smart-form">
            <form action="{{ url('files/upload') }}" class="dropzone" id="user-file-dropzone">

            </form>
        </div>
    </div>
</section>
@stop

@section('scripts')
{{ HTML::script('/js/dropzone/dropzone.min.js') }}
@stop