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
@stop





@section('content')
<div style="clear:both"></div><br/>
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Add Images for contact us and value car</h3>
            </div>
            {!! Form::open(['url' => 'contvaluslider/create','files'=>true]) !!}
            <div class="box-body">


                <div class="form-group">
                    {!! Form::label('contact_us_arabic_slider') !!} 
                    {!! Form::file('contact_us_arabic_slider') !!}
                    <span style="font-weight: bold;">IMG size should be 1920px X 550px</span> 
                </div>
                <div class="form-group">
                    {!! Form::label('contact_us_english_slider') !!} 
                    {!! Form::file('contact_us_english_slider') !!}
                    <span style="font-weight: bold;">IMG size should be 1920px X 550px</span> 
                </div>
                
                
                
                <div class="form-group">
                    {!! Form::label('value_car_arabic_slider') !!} 
                    {!! Form::file('value_car_arabic_slider') !!}
                    <span style="font-weight: bold;">IMG size should be 1920px X 550px</span> 
                </div>
                <div class="form-group">
                    {!! Form::label('value_car_english_slider') !!} 
                    {!! Form::file('value_car_english_slider') !!}
                    <span style="font-weight: bold;">IMG size should be 1920px X 550px</span> 
                </div>

            </div>

            <div class="box-footer">
                {!! Form::submit('save',array('class'=>'class="btn btn-info pull-right"')) !!}
            </div>
            {!! Form::close() !!}

        </div>
    </div>




    
</div>
@stop



@section('footer')

@stop

