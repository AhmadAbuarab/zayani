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
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/style/ara.css')}}">

    </head>
    <body>
        <!-- header -->

        <div class="container-fulid top_area"></div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="navbar navbar-default navbar-static-top ">
                        <div class="container">
                            <div class="navbar-header">

                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>

                                <a href="#" class="mainLogo"><img src="{{URL::asset('assets/img/logo.png') }}"></a>

                            </div>

                            <div class="navbar-collapse collapse navbar-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="{{ URL::to("ar") }}">الرئيسية</a></li>
                                    <li class=" menu-large">
                                        <a href="http://www.al-zayani.com"> Al-zayani.com</a>
                                    </li>
                                    <li class=" menu-large">
                                        <a href="{{ URL::to("ar/contact_us") }}">اتصل بنا</a>					
                                    </li>
                                    <li class="menu-large">
                                        <a href="{{ URL::to("en") }}">English</a>					
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
                        <div class="fill_inner" style="background-image:url({{URL::asset($offerImage->path_slider) }});"></div>
                        <div class="carousel-caption">
                        </div>
                    </div>
                    @else

                    <div class="item">
                        <!-- Set the second background image using inline CSS below. -->
                        <div class="fill_inner" style="background-image:url({{URL::asset($offerImage->path_slider) }});"></div>
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
        <div class="container">
        <div class="row">
            <?php $count2 = 0; ?>
            @if(isset($offerImages))
            <div class="clearfix">
                <div id="thumbcarousel" class="carousel slide" data-interval="false">
                    <div class="carousel-inner">
                        <div class="item active">
                            @foreach($offerImages as $offerImage)
                            @if($offerImage->path_slider !='')
                            <div  data-target="#carousel2" data-slide-to="{{$count2}}" class="col-md-3 col-sm-3 col-xs-3">

                                <div   class="thumb">
                                    <img src="{{URL::asset($offerImage->path)}}">
                                </div>
                            </div>
                            <?php $count2++; ?>
                            @endif
                            @endforeach
                        </div><!-- /item -->
                    </div><!-- /carousel-inner -->

                </div> <!-- /thumbcarousel -->
            </div><!-- /clearfix -->
            @endif

        </div>
        </div>
        </div>
        <!-- end slider -->
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12 col-xs-12 col-md-offset-3">
                    <div class="details">
                        <h1>@if(isset($carsModelData[0]->name_ar)){{$carsModelData[0]->name_ar}} @endif</h1>
                        
                        <br>
                        @if(isset($carsModelData[0]->transmission) && $carsModelData[0]->transmission!='') 
                        {{$carsModelData[0]->transmission}} 
                        @endif
                        <br>
                        
                        <ul>
                            @if(isset($carsModelData[0]->engine)&& $carsModelData[0]->engine!='')    <li><i class="fa fa-angle-left" aria-hidden="true"></i> Engine:<small>@if(isset($carsModelData[0]->engine)){{$carsModelData[0]->engine}} @endif</small></li> @endif
                            @if(isset($carsModelData[0]->fuel_type) && $carsModelData[0]->fuel_type!='')  <li><i class="fa fa-angle-left" aria-hidden="true"></i> Fuel Type:<small>@if(isset($carsModelData[0]->fuel_type)){{$carsModelData[0]->fuel_type}} @endif</small></li>@endif
                            @if(isset($carsModelData[0]->model_year) && $carsModelData[0]->model_year!='')  <li><i class="fa fa-angle-left" aria-hidden="true"></i> Model Year:<small>@if(isset($carsModelData[0]->model_year)){{$carsModelData[0]->model_year}} @endif</small></li>@endif
                            @if(isset($carsModelData[0]->paint_colour) && $carsModelData[0]->paint_colour!='')  <li><i class="fa fa-angle-left" aria-hidden="true"></i> Paint Colour:<small>@if(isset($carsModelData[0]->paint_colour)){{$carsModelData[0]->paint_colour}} @endif</small></li>@endif
                            @if(isset($carsModelData[0]->interior_color) && $carsModelData[0]->interior_color!='')  <li><i class="fa fa-angle-left" aria-hidden="true"></i> Interior Color:<small>@if(isset($carsModelData[0]->interior_color)){{$carsModelData[0]->interior_color}} @endif</small></li>@endif
                            @if(isset($carsModelData[0]->body_style) && $carsModelData[0]->body_style!='') <li><i class="fa fa-angle-left" aria-hidden="true"></i> Body Style:<small>@if(isset($carsModelData[0]->body_style)){{$carsModelData[0]->body_style}} @endif</small></li>@endif
                            @if(isset($carsModelData[0]->mileage) && $carsModelData[0]->mileage!='')  <li><i class="fa fa-angle-left" aria-hidden="true"></i> Mileage:<small>@if(isset($carsModelData[0]->mileage)){{$carsModelData[0]->mileage}} @endif</small></li>@endif
                            @if(isset($carsModelData[0]->num_of_doors) && $carsModelData[0]->num_of_doors!='')  <li><i class="fa fa-angle-left" aria-hidden="true"></i> No.of Doors:<small>@if(isset($carsModelData[0]->num_of_doors)){{$carsModelData[0]->num_of_doors}} @endif</small></li>@endif
                            @if(isset($carsModelData[0]->power) && $carsModelData[0]->power!='')   <li><i class="fa fa-angle-left" aria-hidden="true"></i> Power:<small>@if(isset($carsModelData[0]->power)){{$carsModelData[0]->power}} @endif</small></li>@endif
                            @if(isset($carsModelData[0]->hand_of_drive) && $carsModelData[0]->hand_of_drive!='')   <li><i class="fa fa-angle-left" aria-hidden="true"></i> Hand of Drive:<small>@if(isset($carsModelData[0]->hand_of_drive)){{$carsModelData[0]->hand_of_drive}} @endif</small></li>@endif
                            @if(isset($carsModelData[0]->torque) && $carsModelData[0]->torque!='')   <li><i class="fa fa-angle-left" aria-hidden="true"></i> Torque:<small>@if(isset($carsModelData[0]->torque)){{$carsModelData[0]->torque}} @endif</small></li>@endif
                            @if(isset($carsModelData[0]->maximum_speed) && $carsModelData[0]->maximum_speed!='')    <li><i class="fa fa-angle-left" aria-hidden="true"></i> Maximum Speed:<small>@if(isset($carsModelData[0]->maximum_speed)){{$carsModelData[0]->maximum_speed}} @endif</small></li>@endif
                            @if(isset($carsModelData[0]->acceleration) && $carsModelData[0]->acceleration!='')    <li><i class="fa fa-angle-left" aria-hidden="true"></i> Acceleration:<small>@if(isset($carsModelData[0]->acceleration)){{$carsModelData[0]->acceleration}} @endif</small></li>@endif
                            @if(isset($carsModelData[0]->price) && $carsModelData[0]->price!='')   <li><i class="fa fa-angle-left" aria-hidden="true"></i> Price:<small>@if(isset($carsModelData[0]->price)){{$carsModelData[0]->price}} @endif</small></li>@endif
                        </ul>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12 col-xs-12 col-md-offset-3">
                    <div class="detailsButton">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <a href="{{ URL::to("ar/enquiry/".$carsModelData[0]->id) }}"><button class="btn btn-primary ">  استفسار / تجربة القيادة  </button></a>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <a href="{{ URL::to("ar/valuecar/".$carsModelData[0]->id) }}"><button class="btn btn-primary ">  قيم سيارتك </button></a> 
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
                            <h1>معلومات الاتصال</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class=" col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="subscribe">
                            {!! Form::open(['url' => 'subscribelog/create']) !!}
                            <fieldset class="form-group">
                                <label for="subscribeNewsletter">اشترك في نشرتنا الإخبارية</label>
                                <input name="subemail" type="email" class="form-control" id="subscribeNewsletter" placeholder="أدخل إيميلك">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                            </fieldset>

                            </form>

                        </div>
                    </div>
                    <div class=" col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="logoFotter">
                            <img src="{{URL::asset('assets/img/emtaz_logo.png') }}">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <ul class="contactList">
                            <li><a href="mailto:info@al-zayani.com" class="email"></a> </li>
                            <li><a href="tel:+965 180 8010" class="phone"></a> </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <ul class="addressList">
                            <li>شركة الزياني التجارية</li>
                            <li><li>
                                @if(isset($contactUsData[0]->address_ar))
                                {{$contactUsData[0]->address_ar}}
                                @endif
                            </li>
                            <li>
                                @if(isset($contactUsData[0]->po_box_ar))
                                {{$contactUsData[0]->po_box_ar}}
                                @endif
                            </li>
                        </ul>
                    </div>


                </div>
            </div>
            <div class="copyRight">
                جميع حقوق الطبع والنشر محفوظة لشركة الزياني للسيارات 2015 ©
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