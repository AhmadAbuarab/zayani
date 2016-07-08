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
            <th>id</th>
            <th>subscriber email</th>
            <th>subscription date</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($subscriberData))
        @foreach($subscriberData as $subscriber)
        <tr>
            <td>{{$subscriber->id}}</td>
            <td>{{$subscriber->email}}</td>
            <td>{{$subscriber->created_at}}</td>

        </tr>
        @endforeach
        @endif
    </tbody>
</table>
</div>
@stop



@section('footer')

@stop

