<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta charset="UTF-8">
        <title>Al-Zayani container</title>
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/font-awesome-4.6.3/css/font-awesome.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/style/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/style/enu.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/bootstrap-lightbox.min.css')}}">

    </head>
    <body>
        <!-- header -->

        <div class="container-fulid top_area"></div>

        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="navbar navbar-default navbar-static-top ">
                        <div class="container">
                            <div class="navbar-header">

                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>

                                <a href="{{ URL::to("en") }}" class="mainLogo"><img src="{{URL::asset('assets/img/logo.png') }}"></a>

                            </div>

                            <div class="navbar-collapse collapse navbar-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="{{ URL::to("en") }}">Home</a></li>
                                    <li class="dropdown menu-large">
                                        <a href="http://www.al-zayani.com"> Al-zayani.com</a>
                                    </li>
                                    <li class="dropdown menu-large">
                                        <a href="{{ URL::to("en/contact_us") }}">Contact Us</a>				
                                    </li>
                                    <li class="menu-large">
                                        <a href="{{ URL::to("ar") }}">عربي</a>				
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- end header -->






















        <!-- slider -->
        <div class="container-fulid">
            <header id="myCarousel" class="carousel slide">
                <!-- Indicators -->

                <!-- Wrapper for Slides -->
                <div class="carousel-inner">
                    @if(isset($offerImages))
                    <?php $count = 0; ?>
                    @foreach($offerImages as $offerImage)
                    @if($offerImage->path_slider !='')
                    @if($count == 0)

                    <div class="item active">
                        <!-- Set the first background image using inline CSS below. -->
                        <div class="fill" style="background-image:url('{{URL::asset($offerImage->path_slider) }}');"></div>
                        <div class="carousel-caption">
                        </div>
                    </div>
                    @else

                    <div class="item">
                        <!-- Set the second background image using inline CSS below. -->
                        <div class="fill" style="background-image:url('{{URL::asset($offerImage->path_slider) }}');"></div>
                        <div class="carousel-caption">
                        </div>
                    </div>
                    @endif
                    <?php $count++; ?>
                    @endif
                    @endforeach
                    @endif

                </div>

                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="icon-prev"></span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="icon-next"></span>
                </a>
            </header>	

            <div class="pagePath">

            </div>
        </div>


        <div class="container">
            <div class="row" style="margin-top:30px; margin-bottom:10px;">
                <?php $count2 = 1; ?>
                @if(isset($offerImages))
                @foreach($offerImages as $offerImage)
                @if($offerImage->path_slider !='')
                <div class="col-md-2 col-sm-6 col-xs-12">
                    <a data-toggle="lightbox" href="#demoLightbox{{$count2}}" class="img-thumbnail">
                        <img src="{{URL::asset($offerImage->path)}}" width="100%" alt="Click to view the lightbox">
                    </a>
                </div>
                <div id="demoLightbox{{$count2}}" class="lightbox fade"  tabindex="-1" role="dialog" aria-hidden="true">
                    <div class='lightbox-dialog'>
                        <div class='lightbox-content'>
                            <img src="{{URL::asset($offerImage->path)}}">
                        </div>
                    </div>
                </div>
                <?php $count2++; ?>
                @endif
                @endforeach
                @endif
            </div>
        </div>
        <!-- end slider -->






        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="details">
                        <h1>
                            @if(isset($carsModelData[0]->name_en))
                            {{$carsModelData[0]->name_en}}
                            @endif
                        </h1>
                        <br>
                        @if(isset($carsModelData[0]->transmission) && $carsModelData[0]->transmission!='') 
                        {{$carsModelData[0]->transmission}} 
                        @endif
                        <br>
                        <ul>
                            @if(isset($carsModelData[0]->engine)&& $carsModelData[0]->engine!='')  <li><i class="fa fa-angle-right" aria-hidden="true"></i> Engine:<small>@if(isset($carsModelData[0]->engine)){{$carsModelData[0]->engine}} @endif</small></li>@endif
                            @if(isset($carsModelData[0]->fuel_type) && $carsModelData[0]->fuel_type!='')<li><i class="fa fa-angle-right" aria-hidden="true"></i> Fuel Type:<small>@if(isset($carsModelData[0]->fuel_type)){{$carsModelData[0]->fuel_type}} @endif</small></li>@endif
                            @if(isset($carsModelData[0]->model_year) && $carsModelData[0]->model_year!='')   <li><i class="fa fa-angle-right" aria-hidden="true"></i> Model Year:<small>@if(isset($carsModelData[0]->model_year)){{$carsModelData[0]->model_year}} @endif</small></li>@endif
                            @if(isset($carsModelData[0]->paint_colour) && $carsModelData[0]->paint_colour!='')  <li><i class="fa fa-angle-right" aria-hidden="true"></i> Paint Colour:<small>@if(isset($carsModelData[0]->paint_colour)){{$carsModelData[0]->paint_colour}} @endif</small></li>@endif
                            @if(isset($carsModelData[0]->interior_color) && $carsModelData[0]->interior_color!='')<li><i class="fa fa-angle-right" aria-hidden="true"></i> Interior Color:<small>@if(isset($carsModelData[0]->interior_color)){{$carsModelData[0]->interior_color}} @endif</small></li>@endif
                            @if(isset($carsModelData[0]->body_style) && $carsModelData[0]->body_style!='')  <li><i class="fa fa-angle-right" aria-hidden="true"></i> Body Style:<small>@if(isset($carsModelData[0]->body_style)){{$carsModelData[0]->body_style}} @endif</small></li>@endif
                            @if(isset($carsModelData[0]->mileage) && $carsModelData[0]->mileage!='')  <li><i class="fa fa-angle-right" aria-hidden="true"></i> Mileage:<small>@if(isset($carsModelData[0]->mileage)){{$carsModelData[0]->mileage}} @endif</small></li>@endif
                            @if(isset($carsModelData[0]->num_of_doors) && $carsModelData[0]->num_of_doors!='')<li><i class="fa fa-angle-right" aria-hidden="true"></i> No.of Doors:<small>@if(isset($carsModelData[0]->num_of_doors)){{$carsModelData[0]->num_of_doors}} @endif</small></li>@endif
                            @if(isset($carsModelData[0]->power) && $carsModelData[0]->power!='') <li><i class="fa fa-angle-right" aria-hidden="true"></i> Power:<small>@if(isset($carsModelData[0]->power)){{$carsModelData[0]->power}} @endif</small></li>@endif
                            @if(isset($carsModelData[0]->hand_of_drive) && $carsModelData[0]->hand_of_drive!='')  <li><i class="fa fa-angle-right" aria-hidden="true"></i> Hand of Drive:<small>@if(isset($carsModelData[0]->hand_of_drive)){{$carsModelData[0]->hand_of_drive}} @endif</small></li>@endif
                            @if(isset($carsModelData[0]->torque) && $carsModelData[0]->torque!='') <li><i class="fa fa-angle-right" aria-hidden="true"></i> Torque:<small>@if(isset($carsModelData[0]->torque)){{$carsModelData[0]->torque}} @endif</small></li>@endif
                            @if(isset($carsModelData[0]->maximum_speed) && $carsModelData[0]->maximum_speed!='')  <li><i class="fa fa-angle-right" aria-hidden="true"></i> Maximum Speed:<small>@if(isset($carsModelData[0]->maximum_speed)){{$carsModelData[0]->maximum_speed}} @endif</small></li>@endif
                            @if(isset($carsModelData[0]->acceleration) && $carsModelData[0]->acceleration!='') <li><i class="fa fa-angle-right" aria-hidden="true"></i> Acceleration:<small>@if(isset($carsModelData[0]->acceleration)){{$carsModelData[0]->acceleration}} @endif</small></li>@endif
                            @if(isset($carsModelData[0]->price) && $carsModelData[0]->price!='')  <li><i class="fa fa-angle-right" aria-hidden="true"></i> Price:<small>@if(isset($carsModelData[0]->price)){{$carsModelData[0]->price}} @endif</small></li>@endif
                        </ul>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="detailsButton">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <a href="{{ URL::to("en/enquiry/".$carsModelData[0]->id) }}"><button class="btn btn-primary ">  ENQUIRY / TEST DRIVE  </button></a>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <a href="{{ URL::to("en/valuecar/".$carsModelData[0]->id) }}"><button class="btn btn-primary ">  VALUE YOUR CAR </button></a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <!-- footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footerTitle">
                            <h1>CONTACT INFO</h1>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <ul class="addressList">
                            <li>Al-Zayani Trading Company</li>
                            <li>
                                @if(isset($contactUsData[0]->address_en))
                                {{$contactUsData[0]->address_en}}
                                @endif
                            </li>
                            <li>P.O.Box: @if(isset($contactUsData[0]->po_box_en)) {{$contactUsData[0]->po_box_en}} @endif</li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <ul class="contactList">
                            <li><a href="mailto:info@al-zayani.com" class="email">
                                    @if(isset($contactUsData[0]->email))
                                    {{$contactUsData[0]->email}}
                                    @endif
                                </a> </li>
                            <li><a href="tel:+965 180 8010" class="phone">
                                    @if(isset($contactUsData[0]->mobile))
                                    {{$contactUsData[0]->mobile}}
                                    @endif
                                </a> </li>
                        </ul>
                    </div>
                    <div class=" col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="logoFotter">
                            <img src="{{URL::asset('assets/img/emtaz_logo.png') }}">
                        </div>
                    </div>
                    <div class=" col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="subscribe">
                            {!! Form::open(['url' => 'subscribelog/create']) !!}
                            <fieldset class="form-group">
                                <label for="subscribeNewsletter">Subscribe To Our Newsletter</label>
                                <input name="subemail" type="email" class="form-control" id="subscribeNewsletter" placeholder="Enter email">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                            </fieldset>

                            </form>

                        </div>
                    </div>

                </div>
            </div>
            <div class="copyRight">
                Copyright 2015 © Alzayani Automobile and Trading Co. All rights reserved
            </div>
        </footer>
        <!-- end footer -->
        <script src="{{ URL::asset('assets/js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.js')}}"></script>
        <script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap-lightbox.js')}}"></script>
        <script>
$('.carousel').carousel({
    interval: 5000 //changes the speed
});

        </script>
    </body>
</html>