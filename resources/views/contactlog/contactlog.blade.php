@extends('master')
@section('header')
<meta name="csrf_token" content="{!! csrf_token() !!}"/>
@stop


@section('scripts')
<link rel="stylesheet" type="text/css" href="{{ asset ("assets/dataTables/media/css/jquery.dataTables.css") }}">
<link rel="stylesheet" type="text/css" href="{{ asset ("assets/dataTables/examples/resources/syntax/shCore.css") }}">

<script type="text/javascript" language="javascript" src="{{ asset ("assets/dataTables/media/js/jquery.dataTables.js") }}"></script>
<script type="text/javascript" language="javascript" src="{{ asset ("assets/dataTables/examples/resources/syntax/shCore.js") }}"></script>
<script type="text/javascript" language="javascript" src="{{ asset ("assets/dataTables/examples/resources/demo.js") }}"></script>
<script>
$(document).ready(function () {
    var oTable = $('#carsModelMain').dataTable({
        "scrollX": true
    });
});
</script>

@stop





@section('content')
<div style="clear:both"></div><br/>


<table id="carsModelMain" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>first name</th>
            <th>last name</th>
            <th>email</th>
            <th>mobile number</th>
            <th>phone number</th>
            <th>subject</th>
            <th>message</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($contactLogData))
        @foreach($contactLogData as $data)
        <tr>
            <td>{{$data->first_name}}</td>
            <td>{{$data->last_name}}</td>
            <td>{{$data->email}}</td>
            <td>{{$data->mobile_number}}</td>
            <td>{{$data->phone_number}}</td>
            <td>{{$data->subject}}</td>
            <td>{{$data->message}}</td>

        </tr>
        @endforeach
        @endif
    </tbody>
</table>
</div>
@stop



@section('footer')

@stop

