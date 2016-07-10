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
    var table = $('#carsModelMain').DataTable();
    $('.deleteCarModelMain').click(function () {
        var that = $(this);
        var carId = $(this).parent().children().eq(0).val();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: './deleteCarOffersImgs',
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            data: {carId: carId},
            success: function (data) {
                that.parent().parent().html('');
            }
        })
    });
});
</script>

@stop





@section('content')
<div style="clear:both"></div><br/>
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Add Images for car offer</h3>
            </div>
            {!! Form::open(['url' => 'caroffermodelimg/create','files'=>true]) !!}
            <div class="box-body">
                
                <div class="form-group col-xs-12">
                    {!! Form::label('carId') !!} 
                    {!! Form::select('carId', $carsModelOffers , '' ,['class'=>'form-control col-xs-6']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('upload_image') !!} 
                    {!! Form::file('upload_image') !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('upload_image_slider') !!} 
                    {!! Form::file('upload_image_slider') !!}
                    <span style="font-weight: bold;">IMG size should be 1920px X 550px</span> 
                </div>

            </div>

            <div class="box-footer">
                {!! Form::submit('save',array('class'=>'class="btn btn-info pull-right"')) !!}
            </div>
            {!! Form::close() !!}

        </div>
    </div>




    <table id="carsModelMain" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>car id</th>
                <th>path</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if(isset($carsmodeldata))
            @foreach($carsmodeldata as $carsModelMai)
            <tr>
                <td>{{$carsModelMai->car_offer_id}}</td>
                <td>{{$carsModelMai->path}}</td>
                <td>
                    <input id="carModelMainId" type="hidden" value="{{$carsModelMai->id}}">
                    <img id="deleteCarModelMain" class="deleteCarModelMain" width="20" height="20" src="http://findicons.com/files/icons/753/gnome_desktop/64/gnome_edit_delete.png">
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
@stop



@section('footer')

@stop

