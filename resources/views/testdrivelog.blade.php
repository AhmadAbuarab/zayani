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
                <th>car_model_offer_id</th>
                <th>first_name</th>
                <th>last_name</th>
                <th>email</th>
                <th>phone_number</th>
                <th>best_time_to_contact</th>
                <th>message</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($testdrivedata))
            @foreach($testdrivedata as $carsModelMai)
            <tr>
                <td>{{$carsModelMai->car_model_offer_id}}</td>
                <td>{{$carsModelMai->first_name}}</td>
                <td>{{$carsModelMai->last_name}}</td>
                <td>{{$carsModelMai->email}}</td>
                <td>{{$carsModelMai->phone_number}}</td>
                <td>{{$carsModelMai->best_time_to_contact}}</td>
                <td>{{$carsModelMai->message}}</td>
                
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
@stop



@section('footer')

@stop

