@extends('home.layout')
@section('content')



@stop
@section('scripts')
{{ HTML::script('js/plugin/datatables/jquery.dataTables-cust.js') }}
{{ HTML::script('js/plugin/datatables/DT_bootstrap.js') }}
<script>
    $(document).ready(function(){
        $('#venttable1').dataTable({
        });
    });
</script>
@stop
