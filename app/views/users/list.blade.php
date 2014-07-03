@extends('logged.layout')
@section('content')

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class="bg-danger">
    {{ HTML::ul($errors->all()) }}
</div>
<section id="widget-grid">
    <div class="jarviswidget jarviswidget-sortable" id="wid-id-0"
         data-widget-editbutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="#" class="button-icon jarviswidget-fullscreen-btn" rel="tooltip" data-placement="bottom"
                   data-original-title="Fullscreen"><i class="fa fa-resize-full"></i></a>
                <a href="#" class="button-icon jarviswidget-delete-btn" rel="tooltip" data-placement="bottom"
                   data-original-title="Delete"><i class="fa fa-times"></i></a>
            </div>
            <span class="widget-icon"><i class="fa fa-sitemap"></i></span>

            <h2>All Users List</h2>
            <span class="jarviswidget-loader" style="display:none;"><i class="fa fa-refresh fa-spin"></i></span>
        </header>
        <div class="content">
        </div>
    </div>
</section>
@stop