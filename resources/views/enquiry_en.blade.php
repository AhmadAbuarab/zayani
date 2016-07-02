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

<!-- end header -->
<!-- slider -->
<div class="container-fulid">
<header id="myCarousel" class="carousel slide">
        <!-- Indicators -->

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill_inner" style="background-image:url({{URL::asset($carsModelData[0]->img_slider) }});"></div>
                <div class="carousel-caption">
                </div>
            </div>
            
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
				<span>HOME / JAGUAR / F PACE</span>
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="valueCarText">
				<h1>ENQUIRY / TEST DRIVE</h1>
			</div>
		</div>
	</div>
	<div class="row">

	<div class="col-md-8 col-sm-6 col-xs-12">

		<form class="form-horizontal">

		<div class="col-md-6 col-sm-12 col-xs-12">
		  <div class="form-group">
		    <label for="exampleInputName2">First Name</label>
		    <input type="text" class="form-control" id="exampleInputName2" placeholder="First Name">
		  </div>
		  </div>
		<div class="col-md-6 col-sm-12 col-xs-12">
		  <div class="form-group">
		    <label for="exampleInputName2">Last Name</label>
		    <input type="text" class="form-control" id="exampleInputName2" placeholder="Last Name">
		  </div>
		  </div>
		  
		  <div class="col-md-12 col-sm-12 col-xs-12">
		  <div class="form-group">
		    <label for="exampleInputName2">Email</label>
		    <input type="email" class="form-control" id="exampleInputName2" placeholder="Email">
		  </div>
		  </div>

		  <div class="col-md-12 col-sm-12 col-xs-12">
		  <div class="form-group">
		    <label for="exampleInputName2">Phone Number</label>
		    <input type="phone" class="form-control" id="exampleInputName2" placeholder="Phone Number">
		  </div>
		  </div>


		  <div class="col-md-12 col-sm-12 col-xs-12">
		  <div class="form-group">
		    <label for="exampleInputName2">Best Time to Contact</label>
		    <input type="text" class="form-control" id="exampleInputName2" placeholder="Best Time to Contact">
		  </div>
		  </div>

		<div class="col-md-12 col-sm-12 col-xs-12">
		  <div class="form-group">
		    <label for="message">Message</label>
			<textarea class="form-control" rows="3"></textarea>
		  </div>
		  </div>

		  <div class="col-md-12 col-sm-12 col-xs-12">
		  <button type="submit" class="btn btn-primary">Submit <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
		  </div>
		</form>
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="selectCar">
				<img src="{{URL::asset('assets/img/car_1.jpg') }}" alt="">
                                
				<h1>XE PRESTIGE RENTAL</h1>
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