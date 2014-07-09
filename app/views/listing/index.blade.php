@extends('logged.layout')
@section('content')

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<section id="widget-grid">
    <div class="jarviswidget jarviswidget-sortable" id="wid-id-0"
         data-widget-editbutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="{{ URL::to('/listing/create') }}" class="button-icon" rel="tooltip" data-placement="bottom">&nbsp; <i
                        class="fa fa-plus"> Add New SubUser &nbsp; </i></a>
                <a href="#" class="button-icon jarviswidget-fullscreen-btn" rel="tooltip" data-placement="bottom"
                   data-original-title="Fullscreen"><i class="fa fa-resize-full"></i></a>
                <a href="#" class="button-icon jarviswidget-delete-btn" rel="tooltip" data-placement="bottom"
                   data-original-title="Delete"><i class="fa fa-times"></i></a>
            </div>
            <span class="widget-icon"><i class="fa fa-sitemap"></i></span>

            <h2>User Tree View</h2>
            <span class="jarviswidget-loader" style="display:none;"><i class="fa fa-refresh fa-spin"></i></span>
        </header>
        <div class="span6 tree smart-form">
            <header>
                Your SubUsers
            </header>
            </ul>
        </div>
    </div>
</section>
@stop

@section('scripts')

@stop