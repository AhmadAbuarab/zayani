@extends('master')
@section('header')
@stop

@section('content')
<div style="clear:both"></div><br/>
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Contact Us</h3>
            </div>
            {!! Form::open(['url' => 'contact/create']) !!}
            <div class="box-body">


                <div class="form-group">
                    {!! Form::label('feedBack_arabic') !!} 
                    {!! Form::textarea('feedBack_arabic',$value = isset($contactData->feed_back_ar)? $contactData->feed_back_ar : null ,array('class' => 'form-control')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('feedBack_english') !!} 
                    {!! Form::textarea('feedBack_english',$value = isset($contactData->feed_back_en)? $contactData->feed_back_en: null ,array('class' => 'form-control')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Address_arabic') !!} 
                    {!! Form::text('Address_arabic',$value = isset($contactData->address_ar)? $contactData->address_ar: null ,array('class' => 'form-control')) !!}
                </div>


                <div class="form-group">
                    {!! Form::label('Address_english') !!} 
                    {!! Form::text('Address_english',$value = isset($contactData->address_en)? $contactData->address_en: null ,array('class' => 'form-control')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('POBox_arabic') !!} 
                    {!! Form::text('POBox_arabic',$value = isset($contactData->po_box_ar)? $contactData->po_box_ar: null ,array('class' => 'form-control')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('POBox_english') !!} 
                    {!! Form::text('POBox_english',$value = isset($contactData->po_box_en)? $contactData->po_box_en: null ,array('class' => 'form-control')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Tel_Office') !!} 
                    {!! Form::text('Tel_Office',$value = isset($contactData->telephone)? $contactData->telephone: null ,array('class' => 'form-control')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('showroom_openning_hours') !!} 
                    {!! Form::text('showroom_openning_hours',$value = isset($contactData->showroom_openning_hours)? $contactData->showroom_openning_hours: null ,array('class' => 'form-control')) !!}
                </div>



                <div class="form-group">
                    {!! Form::label('servuce_and_parts_openning_hours') !!} 
                    {!! Form::text('servuce_and_parts_openning_hours',$value = isset($contactData->servuce_and_parts_openning_hours)? $contactData->servuce_and_parts_openning_hours: null ,array('class' => 'form-control')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email') !!} 
                    {!! Form::text('email',$value = isset($contactData->email)? $contactData->email: null ,array('class' => 'form-control')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('mobile') !!} 
                    {!! Form::text('mobile',$value = isset($contactData->mobile)? $contactData->mobile: null ,array('class' => 'form-control')) !!}
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