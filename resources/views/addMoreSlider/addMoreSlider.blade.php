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



    var table = $('#cars').dataTable({
        paging: false
    });
    $('.deleteCar').click(function () {
        var that = $(this);
        var carId = $(this).parent().children().eq(0).val();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: './deleteExtraSlider',
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
            url: './editCar',
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
    $('#cars a.edit').on('click', function (e) {
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
                <h3 class="box-title">Add More Car Offers Sliders</h3>
            </div>
            {!! Form::open(['url' => 'cars/create','files'=>true]) !!}
            <div class="box-body">



                <div class="form-group">
                    {!! Form::label('name_english') !!}                    
                    {!! Form::select('name_english', $carOffers , '' ,['class'=>'form-control col-xs-6']) !!}

                </div>

                <div class="form-group">

                </div>

                <div class="form-group">
                    {!! Form::label('upload_arabic_slider') !!} 
                    {!! Form::file('upload_arabic_slider') !!}
                </div>

                <div class="form-group">
                    {!! Form::label('upload_english_slider') !!} 
                    {!! Form::file('upload_english_slider') !!}
                </div>

            </div>

            <div class="box-footer">
                {!! Form::submit('save',array('class'=>'class="btn btn-info pull-right"')) !!}
            </div>
            {!! Form::close() !!}

        </div>
    </div>




    <table id="cars" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Arbic Name</th>
                <th>English Name</th>
                <th>slider Arabic</th>
                <th>slider English</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($allExtraSliders))
            @foreach($allExtraSliders as $car)
            <tr>
                <td>{{$car->name_ar}}</td>
                <td>{{$car->name_en}}</td>
                <td>{{$car->slider_arabic}}</td>
                <td>{{$car->slider_english}}</td>
                <td>
                    <input id="carId" type="hidden" value="{{$car->id}}">
                    <img id="deleteCar" class="deleteCar" width="20" height="20" src="http://findicons.com/files/icons/753/gnome_desktop/64/gnome_edit_delete.png">
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




