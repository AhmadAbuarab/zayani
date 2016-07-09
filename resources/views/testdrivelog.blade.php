@extends('master')
@section('header')
<meta name="csrf_token" content="{!! csrf_token() !!}"/>
@stop


@section('scripts')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.1/css/buttons.dataTables.min.css">

<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js"></script>
<script>
$(document).ready(function () {
     var oTable = $('#carsModelMain').dataTable({
        "scrollX": true,
        dom: 'Bfrtip',
        buttons: [
            'excelHtml5',
            'pdfHtml5'
        ]
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

