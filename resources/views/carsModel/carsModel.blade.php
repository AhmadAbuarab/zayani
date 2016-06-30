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
 



    function saveRow(oTable, nRow)
    {
        var jqInputs = $('input', nRow);
        oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
        oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
        oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
        oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
        oTable.fnUpdate(jqInputs[4].value, nRow, 4, false);
        oTable.fnUpdate(jqInputs[5].value, nRow, 5, false);
        oTable.fnUpdate(jqInputs[6].value, nRow, 6, false);
        oTable.fnUpdate(jqInputs[7].value, nRow, 7, false);
        oTable.fnUpdate(jqInputs[8].value, nRow, 8, false);
        oTable.fnUpdate(jqInputs[9].value, nRow, 9, false);
        oTable.fnUpdate(jqInputs[10].value, nRow, 10, false);
        oTable.fnUpdate(jqInputs[11].value, nRow, 11, false);
        oTable.fnUpdate(jqInputs[12].value, nRow, 12, false);
        oTable.fnUpdate(jqInputs[13].value, nRow, 13, false);
        oTable.fnUpdate(jqInputs[14].value, nRow, 14, false);
        oTable.fnUpdate(jqInputs[15].value, nRow, 15, false);
        oTable.fnUpdate(jqInputs[16].value, nRow, 16, false);
        oTable.fnUpdate(jqInputs[17].value, nRow, 17, false);
        oTable.fnUpdate(jqInputs[18].value, nRow, 18, false);
        oTable.fnUpdate('[Edit]()', nRow, 18, false);
        oTable.fnDraw();
    }

    function editRow(oTable, nRow)
    {
        var aData = oTable.fnGetData(nRow);
        var jqTds = $('>td', nRow);
        jqTds[0].innerHTML = '<input type="text" value="' + aData[0] + '">';
        jqTds[1].innerHTML = '<input type="text" value="' + aData[1] + '">';
        jqTds[2].innerHTML = '<input type="text" value="' + aData[2] + '">';
        jqTds[3].innerHTML = '<input type="text" value="' + aData[3] + '">';
        jqTds[4].innerHTML = '<input type="text" value="' + aData[4] + '">';
        jqTds[5].innerHTML = '<input type="text" value="' + aData[5] + '">';
        jqTds[6].innerHTML = '<input type="text" value="' + aData[6] + '">';
        jqTds[7].innerHTML = '<input type="text" value="' + aData[7] + '">';
        jqTds[8].innerHTML = '<input type="text" value="' + aData[8] + '">';
        jqTds[9].innerHTML = '<input type="text" value="' + aData[9] + '">';
        jqTds[10].innerHTML = '<input type="text" value="' + aData[10] + '">';
        jqTds[11].innerHTML = '<input type="text" value="' + aData[11] + '">';
        jqTds[12].innerHTML = '<input type="text" value="' + aData[12] + '">';
        jqTds[13].innerHTML = '<input type="text" value="' + aData[13] + '">';
        jqTds[14].innerHTML = '<input type="text" value="' + aData[14] + '">';
        jqTds[15].innerHTML = '<input type="text" value="' + aData[15] + '">';
        jqTds[16].innerHTML = '<input type="text" value="' + aData[16] + '">';
        jqTds[17].innerHTML = '<input type="text" value="' + aData[17] + '">';
        jqTds[18].innerHTML = '<input type="text" value="' + aData[18] + '">';

    }
    var oTable = $('#example').dataTable({
        "scrollX": true
    });
    var nEditing = null;



    $('.save').click(function () {
        var id = $(this).parent().parent().children().closest('.id').children().eq(0).val();
        var carId = $(this).parent().parent().children().closest('.car_id').children().eq(0).val();
        var name_ar = $(this).parent().parent().children().closest('.name_ar').children().eq(0).val();
        var name_en = $(this).parent().parent().children().closest('.name_en').children().eq(0).val();
        var engine = $(this).parent().parent().children().closest('.engine').children().eq(0).val();
        var fuel_type = $(this).parent().parent().children().closest('.fuel_type').children().eq(0).val();
        var model_year = $(this).parent().parent().children().closest('.model_year').children().eq(0).val();
        var paint_colour = $(this).parent().parent().children().closest('.paint_colour').children().eq(0).val();
        var interior_color = $(this).parent().parent().children().closest('.interior_color').children().eq(0).val();
        var body_style = $(this).parent().parent().children().closest('.body_style').children().eq(0).val();
        var mileage = $(this).parent().parent().children().closest('.mileage').children().eq(0).val();
        var num_of_doors = $(this).parent().parent().children().closest('.num_of_doors').children().eq(0).val();
        var power = $(this).parent().parent().children().closest('.power').children().eq(0).val();
        var hand_of_drive = $(this).parent().parent().children().closest('.hand_of_drive').children().eq(0).val();
        var torque = $(this).parent().parent().children().closest('.torque').children().eq(0).val();
        var maximum_speed = $(this).parent().parent().children().closest('.maximum_speed').children().eq(0).val();
        var acceleration = $(this).parent().parent().children().closest('.acceleration').children().eq(0).val();
        var transmission = $(this).parent().parent().children().closest('.transmission').children().eq(0).val();
        var price = $(this).parent().parent().children().closest('.price').children().eq(0).val();

        $.ajax({
            type: "POST",
            dataType: "json",
            url: './editCarModel',
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            data: {id: id, carId: carId, name_ar: name_ar, name_en: name_en, engine: engine, fuel_type: fuel_type, model_year: model_year, paint_colour: paint_colour
                , interior_color: interior_color, body_style: body_style, mileage: mileage, num_of_doors: num_of_doors, power: power,
                hand_of_drive: hand_of_drive, torque: torque, maximum_speed: maximum_speed, acceleration: acceleration, transmission: transmission
                , price: price
            },
            success: function (data) {
            }
        })
    });

    $('.delete').click(function () {
        alert(1);
    });

    $('#example a.edit').on('click', function (e) {
        e.preventDefault();

        /* Get the row as a parent of the link that was clicked on */
        var nRow = $(this).parents('tr')[0];

        if (nEditing !== null && nEditing != nRow) {
            /* A different row is being edited - the edit should be cancelled and this row edited */
            restoreRow(oTable, nEditing);
            editRow(oTable, nRow);
            nEditing = nRow;
        }
        else if (nEditing == nRow && this.innerHTML == "Save") {
            /* This row is being edited and should be saved */
            saveRow(oTable, nEditing);
            nEditing = null;
        }
        else {
            /* No row currently being edited */
            editRow(oTable, nRow);
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
            {!! Form::open(['url' => 'carsmodel/create','files'=>true]) !!}
            <div class="box-body">

                <div class="form-group col-xs-12">
                    {!! Form::label('carId') !!} 
                    {!! Form::select('carId', $cars , '' ,['class'=>'form-control col-xs-6']) !!}
                </div>

                <div class="form-group col-xs-12">
                    {!! Form::label('car_model') !!} 
                    {!! Form::select('car_model', $carsModelMain , '' ,['class'=>'form-control col-xs-6']) !!}
                </div>

                <div class="form-group form-group col-xs-6">
                    {!! Form::label('name_arabic') !!} 
                    {!! Form::text('name_arabic','',array('class' => 'form-control col-md-6 ')) !!}
                </div>


                <div class="form-group form-group col-xs-6">
                    {!! Form::label('name_english') !!} 
                    {!! Form::text('name_english','',array('class' => 'form-control col-md-6 ')) !!}
                </div>


                <div class="form-group col-xs-6">
                    {!! Form::label('engine') !!} 
                    {!! Form::text('engine','',array('class' => 'form-control col-md-6')) !!}
                </div>


                <div class="form-group col-xs-6">
                    {!! Form::label('fuel_type') !!} 
                    {!! Form::text('fuel_type','',array('class' => 'form-control col-md-6')) !!}
                </div>


                <div class="form-group col-xs-6">
                    {!! Form::label('model_year') !!} 
                    {!! Form::text('model_year','',array('class' => 'form-control col-md-6')) !!}
                </div>


                <div class="form-group col-xs-6">
                    {!! Form::label('paint_colour') !!} 
                    {!! Form::text('paint_colour','',array('class' => 'form-control col-md-6')) !!}
                </div>


                <div class="form-group col-xs-6">
                    {!! Form::label('interior_color') !!} 
                    {!! Form::text('interior_color','',array('class' => 'form-control col-md-6')) !!}
                </div>


                <div class="form-group col-xs-6">
                    {!! Form::label('body_style') !!} 
                    {!! Form::text('body_style','',array('class' => 'form-control col-md-6')) !!}
                </div>


                <div class="form-group col-xs-6">
                    {!! Form::label('mileage') !!} 
                    {!! Form::text('mileage','',array('class' => 'form-control col-md-6')) !!}
                </div>



                <div class="form-group col-xs-6">
                    {!! Form::label('num_of_doors') !!} 
                    {!! Form::text('num_of_doors','',array('class' => 'form-control col-md-6')) !!}
                </div>

                <div class="form-group col-xs-6">
                    {!! Form::label('power') !!} 
                    {!! Form::text('power','',array('class' => 'form-control col-md-6')) !!}
                </div>

                <div class="form-group col-xs-6">
                    {!! Form::label('hand_of_drive') !!} 
                    {!! Form::text('hand_of_drive','',array('class' => 'form-control col-md-6')) !!}
                </div>

                <div class="form-group col-xs-6">
                    {!! Form::label('torque') !!} 
                    {!! Form::text('torque','',array('class' => 'form-control col-md-6')) !!}
                </div>

                <div class="form-group col-xs-6">
                    {!! Form::label('maximum_speed') !!} 
                    {!! Form::text('maximum_speed','',array('class' => 'form-control col-md-6')) !!}
                </div>

                <div class="form-group col-xs-6">
                    {!! Form::label('acceleration') !!} 
                    {!! Form::text('acceleration','',array('class' => 'form-control col-md-6')) !!}
                </div>

                <div class="form-group col-xs-6">
                    {!! Form::label('transmission') !!} 
                    {!! Form::text('transmission','',array('class' => 'form-control col-md-6 col-md-6')) !!}
                </div>

                <div class="form-group col-xs-6">
                    {!! Form::label('price') !!} 
                    {!! Form::text('price','',array('class' => 'form-control')) !!}
                </div>



                <div class="form-group col-xs-6">
                    {!! Form::label('upload_car_model_offer_image') !!} 
                    {!! Form::file('upload_car_model_offer_image') !!}
                </div>


                 <div class="form-group col-xs-12">
                    {!! Form::label('details_arabic') !!} 
                    {!! Form::text('details_arabic','',array('class' => 'form-control')) !!}
                </div>
                
                 <div class="form-group col-xs-12">
                    {!! Form::label('details_english') !!} 
                    {!! Form::text('details_english','',array('class' => 'form-control')) !!}
                </div>

            </div>

            <div class="box-footer">
                {!! Form::submit('save',array('class'=>'class="btn btn-info pull-right"')) !!}
            </div>
            {!! Form::close() !!}

        </div>
    </div>



    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
        <thead>
            <tr>
                <th>id</th>
                <th>Car </th>
                <th style="width: 150px !important;">Car Name In Arabic</th>
                <th style="width: 150px !important;">Car Name In English</th>
                <th>Engine</th>
                <th style="width: 80px !important;">Fuel Type</th>
                <th style="width: 80px !important;"> Model Year</th>
                <th style="width: 80px !important;">Paint Colour</th>
                <th style="width: 120px !important;">Interior Color</th>
                <th style="width: 80px !important;">Body Style</th>
                <th>Mileage</th>
                <th style="width: 150px !important;">Number Of Doors</th>
                <th>Power</th>
                <th style="width: 120px !important;">Hand Of Drive</th>
                <th>Torque</th>
                <th style="width: 120px !important;">Maximum Speed</th>
                <th>Acceleration</th>
                <th>Transmission</th>
                <th>Price</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Save</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($carsModel))
            @foreach($carsModel as $carModel)
            <tr class="odd gradeX">

                <td id="id" class="id">{{$carModel->id}}</td>
                <td id="car_id" class="car_id">{{$carModel->car_id}}</td>
                <td class="name_ar">{{$carModel->name_ar}}</td>
                <td class="name_en">{{$carModel->name_en}}</td>
                <td class="engine">{{$carModel->engine}}</td>
                <td class="fuel_type">{{$carModel->fuel_type}}</td>
                <td class="model_year">{{$carModel->model_year}}</td>
                <td class="paint_colour">{{$carModel->paint_colour}}</td>
                <td class="interior_color">{{$carModel->interior_color}}</td>
                <td class="body_style">{{$carModel->body_style}}</td>
                <td class="mileage">{{$carModel->mileage}}</td>
                <td class="num_of_doors">{{$carModel->num_of_doors}}</td>
                <td class="power">{{$carModel->power}}</td>
                <td class="hand_of_drive">{{$carModel->hand_of_drive}}</td>
                <td class="torque">{{$carModel->torque}}</td>
                <td class="maximum_speed">{{$carModel->maximum_speed}}</td>
                <td class="acceleration">{{$carModel->acceleration}}</td>
                <td class="transmission">{{$carModel->transmission}}</td>
                <td class="price">{{$carModel->price}}</td>

                <td><a class="edit" href="">Edit</a></td>
                <td><a class="delete" href="">Delete</a></td>
                <td> <a class="save" href="./carsmodel">save</a></td>
            </tr>
            ...
            @endforeach
            @endif
        </tbody>
    </table>
</div>
@stop



@section('footer')

@stop