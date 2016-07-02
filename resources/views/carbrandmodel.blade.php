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
            url: './deleteCarBrandModel',
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
                <h3 class="box-title">Add Car Brand Model</h3>
            </div>
            {!! Form::open(['url' => 'carbrandmodel/create']) !!}
            <div class="box-body">
                
                <div class="form-group col-xs-12">
                    {!! Form::label('carId') !!} 
                    {!! Form::select('carId', $cars , '' ,['class'=>'form-control col-xs-6']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('name_arabic') !!} 
                    {!! Form::text('name_arabic','',array('class' => 'form-control')) !!}
                </div>


                <div class="form-group">
                    {!! Form::label('name_english') !!} 
                    {!! Form::text('name_english','',array('class' => 'form-control')) !!}
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
                <th>Arbic Name</th>
                <th>English Name</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if(isset($carBrandModel))
            @foreach($carBrandModel as $carsModelMai)
            <tr>
                <td>{{$carsModelMai->name_ar}}</td>
                <td>{{$carsModelMai->name_en}}</td>
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

