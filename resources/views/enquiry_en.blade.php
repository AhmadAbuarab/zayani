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
        </div>
        <!-- end slider -->

        

        <!-- car section -->
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="pagePath">

                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="valueCarText">

                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-8 col-sm-6 col-xs-12">

                    <form class="form-horizontal">
                         {!! Form::open(['url' => 'testcaraddlog/create']) !!}
                         <input name="id" type="hidden" value="{{$carsModelData[0]->id}}" >
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputName2">First Name</label>
                                <input name="first_name" type="text" class="form-control" id="exampleInputName2" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputName2">Last Name</label>
                                <input name="last_name" type="text" class="form-control" id="exampleInputName2" placeholder="Last Name">
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputName2">Email</label>
                                <input name="email" type="email" class="form-control" id="exampleInputName2" placeholder="Email">
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputName2">Phone Number</label>
                                <input name="phone_number" type="phone" class="form-control" id="exampleInputName2" placeholder="Phone Number">
                            </div>
                        </div>


                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputName2">Best Time to Contact</label>
                                <input name="best_time_to_contact" type="text" class="form-control" id="exampleInputName2" placeholder="Best Time to Contact">
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
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
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="selectCar">
                        @if(isset($carsModelData[0]->img_slider))
                        <img src="{{URL::asset($carsModelData[0]->img_slider) }}" alt="">
                        @endif
                        @if(isset($carsModelData[0]->name_en))
                        <h1>{{$carsModelData[0]->name_en}}</h1>
                        @endif
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
                            <li>P.O.Box:  
                                @if(isset($contactUsData[0]->po_box_en))
                                {{$contactUsData[0]->po_box_en}}
                                @endif
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <ul class="contactList">
                            <li><a href="" class="email">
                                    @if(isset($contactUsData[0]->email))
                                    {{$contactUsData[0]->email}}
                                    @endif
                                </a> </li>
                            <li><a href="" class="phone">
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
                            <form >
                                <fieldset class="form-group">
                                    <label for="subscribeNewsletter">Subscribe To Our Newsletter</label>
                                    <input type="email" class="form-control" id="subscribeNewsletter" placeholder="Enter email">
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