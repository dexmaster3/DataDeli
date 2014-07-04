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
            <div class="widget-body no-padding">
                <div class="widget-body-toolbar">
                    <div class="widget-body-toolbar"></div>
                    <table id="userListDataTable" class="table table-striped table-bordered table-hover dataTable">
                        <thead>
                        <tr role="row">
                            <th>User Email</th>
                            <th>User Name</th>
                            <th>Phone Number</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td><a href="{{ url('users/' . $user->id) }}">{{ $user->email }}</a></td>
                            <td>{{ $user->contact->firstName }} {{ $user->contact->lastName }}</td>
                            <td>{{ $user->contact->phone }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('scripts')
{{ HTML::script('js/plugin/datatables/jquery.dataTables-cust.js') }}
{{ HTML::script('js/plugin/datatables/DT_bootstrap.js') }}
<script>
    $(document).ready(function(){
        $('#userListDataTable').dataTable({
        });
    });
</script>
@stop