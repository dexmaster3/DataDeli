@extends('logged.layout')

@section('head')
{{ HTML::style('/css/datatables/dataTables.bootstrap.css') }}
{{ HTML::style('/css/multiselect/multi-select.css') }}
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
                            <th>Publicly Viewable</th>
                            <th>Visibility</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($files as $file)
                        <tr>
                            <td><a href="{{ $file->location }}">{{ $file->filename }}</a></td>
                            @if ($file->public)
                            <td><div class="checkbox"><label><input checked type="checkbox" id="public-check-{{ $file->id }}" onchange="setPublic({{ $file->id }})"/> Public </label></div></td>
                            @else
                            <td><div class="checkbox"><label><input type="checkbox" id="public-check-{{ $file->id }}" onchange="setPublic({{ $file->id }})"/> Public </label></div></td>
                            @endif
                            <td><button onclick='getFilePermissions({{ $file->id }})' id='{{ "set-visible-" . $file->id }}' class="btn-primary btn">Set</button></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="file-permissions-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Set Permissions for <span id="file-title"></span></h4>
            </div>
            <div class="modal-body">
                <select multiple="multiple" id="modal-select" name="modal-select[]">

                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="setFileButton" onclick="setFilePermissions()" type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@stop

@section('scripts')
{{ HTML::script('js/datatables/jquery.dataTables.min.js') }}
{{ HTML::script('js/datatables/dataTables.bootstrap.js') }}
{{ HTML::script('js/multiselect/jquery.multi-select.js') }}
<script>
    $(document).ready(function () {
        $('#userFileTable').dataTable({
            "bFilter": false,
            "bLengthChange": false
        });
    });

    function getFilePermissions(id) {
        $(".ms-container").remove();
        $("#modal-select").remove();
        $(".modal-body").append('<select multiple="multiple" id="modal-select" name="modal-select[]"></select>');
        $.ajax({
            type: "GET",
            url: "/files/listvisibility/" + id
        }).success(function(response){
            $.each(response.users, function (index){
                var selectedbool = $.inArray(response.users[index].id, response.visible) > -1;
                var optionString = "<option value=" + response.users[index].id;
                if (selectedbool) {
                    optionString += " selected>"
                } else {
                    optionString += ">"
                }
                optionString += response.users[index].email + "</option>";
                $("#modal-select").append(optionString);
            });
            $("#modal-select").multiSelect();
            $("#setFileButton").attr('onclick', 'setFilePermissions(' + id + ')')
            $("#file-permissions-modal").modal();
        })
    }

    function setFilePermissions(file_id) {
        var dataString = $("select#modal-select").val().map(function(item){
            return parseInt(item, 10);
        });
        $.ajax({
            type: "POST",
            url: "/files/setvisibility",
            data: JSON.stringify({data: dataString, fileId: file_id}),
            contentType: "application/json; charset=utf-8",
            dataType: "json"
        }).success(function() {
            $("#file-permissions-modal").modal('hide');
        })
    }

    function setPublic(file_id)
    {
        var checked = $("#public-check-" + file_id).is(":checked");
        $.ajax({
            type: "POST",
            url: "/files/setpublic",
            data: JSON.stringify({data: checked, fileId: file_id}),
            contentType: "application/json; charset=utf-8",
            dataType: "json"
        }).success(function() {
            $("#file-permissions-modal").modal('hide');
        })
    }
</script>
@stop