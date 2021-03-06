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
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for Slides -->
                <div class="carousel-inner">
                    <?php $count=0; ?>
                    @if(isset($carsModel))
                    @foreach($carsModel as $carMod)
                    @if(isset($carMod->img_slider_slider) && $carMod->img_slider_slider !='')
                    @if($count == 0)
                    <div class="item active">
                        <!-- Set the first background image using inline CSS below. -->
                        <div class="fill" style="background-image:url({{URL::asset($carMod->img_slider_slider)}});"></div>
                        <div class="carousel-caption">
                            <!--                 	<div class="sliderTitle">
                                                <h1>F-PACE</h1>
                                                <span>ABOVE ALL, IT'S A JAGUAR</span>
                                                </div> -->
<!--                            <button class="btn btn-primary sliderButton">More <i class="fa fa-chevron-right" aria-hidden="true"></i>
                            </button>-->

                        </div>
                    </div>
                    @else
                    
                    <div class="item">
                        <!-- Set the third background image using inline CSS below. -->
                        <div class="fill" style="background-image:url({{URL::asset($carMod->img_slider_slider)}});"></div>
<!--                        <div class="carousel-caption">
                            <button class="btn btn-primary sliderButton">More <i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                        </div>-->
                    </div>
                    @endif
                    <?php $count++; ?>
                    @endif
                    @endforeach
                    @endif
                    
                    
                    
                    
                    
                    @if(isset($extraSliders))
                    @foreach($extraSliders as $extraSlider)
                    @if(isset($extraSlider->slider_english) && $extraSlider->slider_english !='')
                    
                    
                    
                     <div class="item">
                        <!-- Set the third background image using inline CSS below. -->
                        <div class="fill" style="background-image:url({{URL::asset($extraSlider->slider_english)}});"></div>
<!--                        <div class="carousel-caption">
                            <button class="btn btn-primary sliderButton">More <i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                        </div>-->
                    </div>
                    
                    
                    
                    
                    
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
        </div>
        <!-- end slider -->


        <!-- car section -->
        <div class="container">
            <div class="row">
                @if(isset($carsModel))
                @foreach($carsModel as $carMod)
                <div class="col-md-4 col-sm-4 col-xs-12">

                    <div class="offer">
                        @if(isset($carMod->img_slider))
                        <img src="{{URL::asset($carMod->img_slider)}}">
                        @else
                        <img src="">
                        @endif

                        <h1>{{$carMod->name_en}}</h1>
                        @if(isset($carsModelDetails))
                        <ul>
                            @foreach($carsModelDetails as $carsModelDetail)
                            @if($carsModelDetail->car_model_id == $carMod->id && $carsModelDetail->detail_en != '')
                            <li><i class="fa fa-angle-right" aria-hidden="true"></i> {{$carsModelDetail->detail_en}}</li>
                            @endif
                            @endforeach
                        </ul>
                        <a href="{{ URL::to("en/details/".$carMod->id) }}"><button class="btn btn-primary">More <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                        @endif
                    </div>

                </div>
                @endforeach
                @endif  


            </div>
        </div>
        <!-- end car section -->


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
                                </a> 

                            </li>
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
        <script>
$('.carousel').carousel({
    interval: 5000 //changes the speed
});

        </script>
    </body>
</html>