@extends('logged.layout')
@section('content')

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class="bg-danger">
    {{ HTML::ul($errors->all()) }}
</div>
<section id="widget-grid">
    <div class="jarviswidget jarviswidget-color-orange jarviswidget-sortable" id="wid-id-0"
         data-widget-editbutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="#" class="button-icon jarviswidget-fullscreen-btn" rel="tooltip" data-placement="bottom"
                   data-original-title="Fullscreen"><i class="fa fa-resize-full"></i></a>
                <a href="#" class="button-icon jarviswidget-delete-btn" rel="tooltip" data-placement="bottom"
                   data-original-title="Delete"><i class="fa fa-times"></i></a>
            </div>
            <span class="widget-icon"><i class="fa fa-sitemap"></i></span>

            <h2>Add Your Contact Info</h2>
            <span class="jarviswidget-loader" style="display:none;"><i class="fa fa-refresh fa-spin"></i></span>
        </header>
        <div class="content">
        <div class="widget-body no-padding">
            {{ Form::open(array('url' => 'contactinfo', 'class' => 'span6 smart-form')) }}
            <header>
                Add your contact information
            </header>
            <fieldset>
            <div class="form-group">
                {{ Form::label('firstName', "First Name", array('class' => 'label')) }}
                <label class="input">
                {{ Form::text('firstName', Input::old('firstName'), array('class' => 'form-control')) }}
                    </label>
            </div>

            <div class="form-group">
                {{ Form::label('lastName', "Last Name", array('class' => 'label')) }}
                <label class="input">
                {{ Form::text('lastName', Input::old('lastName'), array('class' => 'form-control')) }}
                </label>
            </div>

            <div class="form-group">
                {{ Form::label('phone', "Phone Number", array('class' => 'label')) }}
                <label class="input">
                {{ Form::text('phone', Input::old('phone'), array('class' => 'form-control')) }}
                </label>
            </div>
            </fieldset>
            <footer>
            {{ Form::submit('Update Info', array('class' => 'btn btn-primary')) }}
            </footer>
            {{ Form::close() }}
        </div>
    </div>
        </div>
</section>
@stop