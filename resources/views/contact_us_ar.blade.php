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
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill_inner" style="background-image:url({{URL::asset('assets/img/slider_inner_1.png') }});"></div>
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill_inner" style="background-image:url({{URL::asset('assets/img/slider_inner_1.png') }});"></div>
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill_inner" style="background-image:url({{URL::asset('assets/img/slider_inner_1.png') }});"></div>
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
				<h1>اتصل بنا</h1>
			</div>
		</div>
	</div>
	<div class="row">

	<div class="col-md-6 col-sm-6 col-xs-12">
	<div class="feedback">
		<h1>ردود الفعل والاستفسارات</h1>
		<span>
                            @if(isset($contactUsPageData[0]->feed_back_ar))
                            {{$contactUsPageData[0]->feed_back_ar}}
                            @endif
                        </span>
		</div>
		<form class="form-horizontal">

		<div class="col-md-12 col-sm-12 col-xs-12">
		  <div class="form-group">
		    <label for="exampleInputName2">الاسم الاول</label>
		    <input type="text" class="form-control" id="exampleInputName2" placeholder="الاسم الاول">
		  </div>
		  </div>
		<div class="col-md-12 col-sm-12 col-xs-12">
		  <div class="form-group">
		    <label for="exampleInputName2">الاسم الاخير</label>
		    <input type="text" class="form-control" id="exampleInputName2" placeholder="الاسم الاخير">
		  </div>
		  </div>
		  
		  <div class="col-md-12 col-sm-12 col-xs-12">
		  <div class="form-group">
		    <label for="exampleInputName2">البريد الالكتروني</label>
		    <input type="email" class="form-control" id="exampleInputName2" placeholder="البريد الالكتروني">
		  </div>
		  </div>

		  <div class="col-md-12 col-sm-12 col-xs-12">
		  <div class="form-group">
		    <label for="exampleInputName2">الهاتف النقال</label>
		    <input type="phone" class="form-control" id="exampleInputName2" placeholder="الهاتف النقال">
		  </div>
		  </div>

		  <div class="col-md-12 col-sm-12 col-xs-12">
		  <div class="form-group">
		    <label for="exampleInputName2">رقم الهاتف</label>
		    <input type="phone" class="form-control" id="exampleInputName2" placeholder="رقم الهاتف">
		  </div>
		  </div>

		  <div class="col-md-12 col-sm-12 col-xs-12">
		  <div class="form-group">
		    <label for="exampleInputName2">الموضوع</label>
		    <input type="text" class="form-control" id="exampleInputName2" placeholder="الموضوع">
		  </div>
		  </div>

		<div class="col-md-12 col-sm-12 col-xs-12">
		  <div class="form-group">
		    <label for="message">الرسالة</label>
			<textarea class="form-control" rows="3"></textarea>
		  </div>
		  </div>

		  <div class="col-md-12 col-sm-12 col-xs-12">
		  <button type="submit" class="btn btn-primary">ارسال <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
		  </div>
		</form>
		</div>



		<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="addressInfo">
						<h1>معلومات العنوان</h1>

				<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:200px;width:100%;'><div id='gmap_canvas' style='height:200px;width:100%;'></div><div><small><a href="http://embedgooglemaps.com">									embed google maps							</a></small></div><div><small><a href="https://privacypolicygenerator.info">privacy policy generator</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(29.31166,47.48176599999999),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(29.31166,47.48176599999999)});infowindow = new google.maps.InfoWindow({content:'<strong>Al-ZYANI</strong><br>Kuwait<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>

				<h2>معرض، قطع غيار و مركز الخدمة</h2>
				<ul>
					<li>العنوان: @if(isset($contactUsPageData[0]->address_ar)){{$contactUsPageData[0]->address_ar}} @endif,،</li>
					<li>ص.ب:@if(isset($contactUsPageData[0]->po_box_ar)){{$contactUsPageData[0]->po_box_ar}} @endif</li>
					<li>هاتف المكتب :@if(isset($contactUsPageData[0]->telephone)) {{$contactUsPageData[0]->telephone}} @endif</li>
				</ul>

				<h2>ساعات العمل</h2>
				<h3>صالة عرض</h3>
				<ul>
					<li>
                                @if(isset($contactUsPageData[0]->showroom_openning_hours))
                                {{$contactUsPageData[0]->showroom_openning_hours}}
                                @endif
                            </li>
				</ul>

				<h3>الخدمة وقطع الغيار</h3>
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
					<h1>معلومات الاتصال</h1>
				</div>
			</div>
		</div>
		<div class="row">
		<div class=" col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="subscribe">
			<form >
			  <fieldset class="form-group">
			    <label for="subscribeNewsletter">اشترك في نشرتنا الإخبارية</label>
			    <input type="email" class="form-control" id="subscribeNewsletter" placeholder="أدخل إيميلك">
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
				<li><a href="mailto:info@al-zayani.com" class="email">@if(isset($contactUsData[0]->email)) {{$contactUsData[0]->email}} @endif</a> </li>
				<li><a href="tel:+965 180 8010" class="phone">@if(isset($contactUsData[0]->mobile)) {{$contactUsData[0]->mobile}} @endif</a> </li>
			</ul>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<ul class="addressList">
				<li>شركة الزياني التجارية</li>
				<li><li>@if(isset($contactUsData[0]->address_ar)) {{$contactUsData[0]->address_ar}} @endif</li>
				<li>@if(isset($contactUsData[0]->po_box_ar)) {{$contactUsData[0]->po_box_ar}} @endif</li>
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