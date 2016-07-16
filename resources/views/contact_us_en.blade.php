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

                                <a href="#" class="mainLogo"><img src="{{URL::asset('assets/img/logo.png') }}"></a>

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

       @if(isset($contactUsSliders[0]->contact_slider_english) && $contactUsSliders[0]->contact_slider_english != '')
        <div class="container-fulid">
            <header id="myCarousel" class="carousel slide">
                <!-- Indicators -->

                <!-- Wrapper for Slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <!-- Set the first background image using inline CSS below. -->
                        <div class="fill_inner" style="background-image:url({{URL::asset($contactUsSliders[0]->contact_slider_english)}});"></div>
                        <div class="carousel-caption">
                        </div>
                    </div>
                </div>

                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="icon-next"></span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="icon-prev"></span>
                </a>
            </header>	
        </div>
        @endif



        <!-- car section -->
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="pagePath">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="valueCarText">
                        <h1>Contact Us</h1>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="feedback">
                        <h1>FEEDBACK AND INQUIRIES</h1>
                        <span>
                            @if(isset($contactUsPageData[0]->feed_back_en))
                            {{$contactUsPageData[0]->feed_back_en}}
                            @endif
                        </span>
                    </div>
                    {!! Form::open(['url' => 'contactlog/create']) !!}

                    <div class="col-md-12 col-sm-12 col-xs-12 {{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="exampleInputName2">First Name</label>
                            <input type="text" name="first_name" class="form-control" id="exampleInputName2" placeholder="First Name">
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 {{ $errors->has('last_name') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="exampleInputName2">Last Name</label>
                            <input type="text" name="last_name" class="form-control" id="exampleInputName2" placeholder="Last Name">
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12 {{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="exampleInputName2">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputName2" placeholder="Email">
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12 {{ $errors->has('mobile_number') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="exampleInputName2">Mobile Number</label>
                            <input type="phone" name="mobile_number" class="form-control phone_number" id="exampleInputName2" placeholder="Mobile Number" value="00965">
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputName2">Phone Number</label>
                            <input type="phone" name="phone_number" class="form-control phone_number" id="exampleInputName2" placeholder="Phone Number" value="00965">
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputName2">Subject</label>
                            <input type="text" name="subject" class="form-control" id="exampleInputName2" placeholder="Subject">
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12 {{ $errors->has('message') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="message" class="form-control" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <button type="submit" class="btn btn-primary">Submit <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                    </div>
                    </form>
                </div>



                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="addressInfo">
                        <h1>ADDRESS INFORMATION</h1>

                        <script src="http://maps.googleapis.com/maps/api/js"></script>

                        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOeK-SPWVJsQ4Y2s5M2YD0Kbarhifg-44&callback=initMap">
                        </script>



                        <div style='overflow:hidden;height:200px;width:100%;'><div id='gmap_canvas' style='height:200px;width:100%;'></div><div><small><a href="http://embedgooglemaps.com">									embed google maps							</a></small></div><div><small><a href="https://privacypolicygenerator.info">privacy policy generator</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map() {
                                var myOptions = {zoom: 10, center: new google.maps.LatLng(29.31166, 47.48176599999999), mapTypeId: google.maps.MapTypeId.ROADMAP};
                                map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
                                marker = new google.maps.Marker({map: map, position: new google.maps.LatLng(29.31166, 47.48176599999999)});
                                infowindow = new google.maps.InfoWindow({content: '<strong>Al-ZYANI</strong><br>Kuwait<br>'});
                                google.maps.event.addListener(marker, 'click', function () {
                                    infowindow.open(map, marker);
                                });
                                infowindow.open(map, marker);
                            }
                            google.maps.event.addDomListener(window, 'load', init_map);</script>

                        <h2>Showroon,Parts and Service center</h2>
                        <ul>
                            <li>Address : @if(isset($contactUsPageData[0]->address_en)){{$contactUsPageData[0]->address_en}} @endif,</li>
                            <li>P.O.Box : @if(isset($contactUsPageData[0]->po_box_en)){{$contactUsPageData[0]->po_box_en}} @endif</li>
                            <li>Tel Office :@if(isset($contactUsPageData[0]->telephone)) {{$contactUsPageData[0]->telephone}} @endif</li>
                        </ul>

                        <h2>OPENING HOURS</h2>
                        <h3>SHOWROOM</h3>
                        <ul>
                            <li>
                                @if(isset($contactUsPageData[0]->showroom_openning_hours))
                                {{$contactUsPageData[0]->showroom_openning_hours}}
                                @endif
                            </li>


                        </ul>

                        <h3>SERVICE AND PARTS</h3>
                        <ul>
                            <li>
                                @if(isset($contactUsPageData[0]->servuce_and_parts_openning_hours))
                                {{$contactUsPageData[0]->servuce_and_parts_openning_hours}}
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
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
                            <li>P.O.Box:@if(isset($contactUsData[0]->po_box_en)) {{$contactUsData[0]->po_box_en}} @endif</li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <ul class="contactList">
                            <li><a href="mailto:info@al-zayani.com" class="email">@if(isset($contactUsData[0]->email)) {{$contactUsData[0]->email}} @endif</a> </li>
                            <li><a href="tel:+965 180 8010" class="phone">@if(isset($contactUsData[0]->mobile)) {{$contactUsData[0]->mobile}} @endif</a> </li>
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
                            $(document).ready(function () {
                                $('.carousel').carousel({
                                    interval: 5000 //changes the speed
                                });

                                var readOnlyLength = $('.phone_number').val().length;

                                $('.phone_number').on('keypress, keydown', function (event) {
                                    if ((event.which != 37 && (event.which != 39))
                                            && ((this.selectionStart < readOnlyLength)
                                                    || ((this.selectionStart == readOnlyLength) && (event.which == 8)))) {
                                        return false;
                                    }
                                });
                            });
        </script>

    </body>
</html>
