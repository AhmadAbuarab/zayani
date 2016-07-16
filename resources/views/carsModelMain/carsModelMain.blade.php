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
    var table = $('#carsModelMain').dataTable();
    $('.deleteCarModelMain').click(function () {
        var that = $(this);
        var carId = $(this).parent().children().eq(0).val();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: './deleteCarModelMain',
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
















    function saveRow(table, nRow) {
        var jqInputs = $('input', nRow);
        table.fnUpdate(jqInputs[0].value, nRow, 0, false);
        table.fnUpdate(jqInputs[1].value, nRow, 1, false);
        table.fnUpdate('[Edit]()', nRow, 18, false);
        table.fnDraw();
    }

    function editRow(table, nRow) {
        var aData = table.fnGetData(nRow);
        var jqTds = $('>td', nRow);
        jqTds[0].innerHTML = '<input type="text" value="' + aData[0] + '">';
        jqTds[1].innerHTML = '<input type="text" value="' + aData[1] + '">';
    }
    var nEditing = null;

    $('.save').click(function () {
        var id = $(this).parent().parent().children().eq(2).children().eq(0).val();
        var name_ar = $(this).parent().parent().children().eq(0).children().eq(0).val();
        var name_en = $(this).parent().parent().children().eq(1).children().eq(0).val();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: './editCarModelMain',
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            data: {id: id, name_ar: name_ar, name_en: name_en,
            },
            success: function (data) {
            }
        })
    });

    $('#carsModelMain a.edit').on('click', function (e) {
        e.preventDefault();

        /* Get the row as a parent of the link that was clicked on */
        var nRow = $(this).parents('tr')[0];

        if (nEditing !== null && nEditing != nRow) {
            /* A different row is being edited - the edit should be cancelled and this row edited */
            restoreRow(table, nEditing);
            editRow(table, nRow);
            nEditing = nRow;
        }
        else if (nEditing == nRow && this.innerHTML == "Save") {
            /* This row is being edited and should be saved */
            saveRow(table, nEditing);
            nEditing = null;
        }
        else {
            /* No row currently being edited */
            editRow(table, nRow);
            nEditing = nRow;
        }
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
                <h3 class="box-title">Add Car Model</h3>
            </div>
            {!! Form::open(['url' => 'carsmodelmain/create','files'=>true]) !!}
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

                <div class="form-group col-xs-6">
                    {!! Form::label('slider_img') !!} 
                    {!! Form::file('slider_img') !!}
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
                <th>Arbic Name</th>
                <th>English Name</th>
                <th>Delete</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if(isset($carsModelMain))
            @foreach($carsModelMain as $carsModelMai)
            <tr>
                <td>{{$carsModelMai->car_model_main_name_en}}</td>
                <td>{{$carsModelMai->car_model_main_name_ar}}</td>
                <td>
                    <input id="carModelMainId" type="hidden" value="{{$carsModelMai->id}}">
                    <img id="deleteCarModelMain" class="deleteCarModelMain" width="20" height="20" src="http://findicons.com/files/icons/753/gnome_desktop/64/gnome_edit_delete.png">
                </td>
                <td><a class="edit" href="">Edit</a></td>
                <td><a class="save" href="./carsmodelmain">save</a></td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>











{!! Form::open(['url' => 'carsmodelmain/changeimgslider','files'=>true]) !!}
<div class="row" style="border: 3px solid red; margin-top: 50px;">
    <div class="box-header with-border" >
        <h3 class="box-title" style="width: 100%; color:red;">Change car Model Slider</h3>
    </div>
    <div class="col-md-12">
        <div class="form-group col-xs-12">
            {!! Form::label('car_model') !!} 
            {!! Form::select('car_model', $carsModelMainData , '' ,['class'=>'form-control col-xs-6']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('change_car_model_slider') !!} 
            {!! Form::file('change_car_model_slider') !!}
        </div>
        <div class="form-group">
            {!! Form::submit('change',array('class'=>'class="btn btn-info pull-right"')) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@stop



@section('footer')

@stop

