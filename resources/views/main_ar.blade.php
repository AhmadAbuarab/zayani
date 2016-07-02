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
                <ol class="carousel-indicators">
                        @if(isset($carsModelMan))
                        <?php $count = 0; ?>
                            @foreach($carsModelMan as $car)
                                @if($count == 0)
                                    <li data-target="#myCarousel" data-slide-to="{{$count}}" class="active"></li>
                                @else   
                                    <li data-target="#myCarousel" data-slide-to="{{$count}}"></li>
                                <?php $count++; ?>
                                @endif
                            @endforeach
                        @endif
                </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
                    @if(isset($carsModelMan))
                    <?php $count = 0; ?>
                    @foreach($carsModelMan as $car)
                    @if($count == 0 && $car->slider_img!='')
                    <div class="item active">
                        <!-- Set the first background image using inline CSS below. -->
                        <div class="fill" style="background-image:url({{URL::asset($car->slider_img)}});"></div>
                        <div class="carousel-caption">
                            <!--                 	<div class="sliderTitle">
                                                <h1>F-PACE</h1>
                                                <span>ABOVE ALL, IT'S A JAGUAR</span>
                                                </div> -->
                            <a href="{{ URL::to("ar/offers/".$car->id) }}"><button class="btn btn-primary sliderButton">المزيد <i class="fa fa-chevron-right" aria-hidden="true"></i></button></a>

                        </div>
                    </div>
                    <?php $count++; ?>
                    @elseif($count !=0 && $car->slider_img!='')

                    <div class="item">
                        <!-- Set the second background image using inline CSS below. -->
                        <div class="fill" style="background-image:url({{URL::asset($car->slider_img)}});"></div>
                        <div class="carousel-caption">
                            <a href="{{ URL::to("ar/offers/".$car->id) }}"><button class="btn btn-primary sliderButton">المزيد <i class="fa fa-chevron-right" aria-hidden="true"></i></button></a>
                        </div>
                    </div>

                    @endif
                    @endforeach
                    @endif    

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
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="carModel">
				<img src="{{URL::asset('assets/img/value_your_car_1.png')}}">
				<h1><a href="{{ URL::to("ar/valuecar") }}"> قيمة سيارتاك</a></h1>
			</div>
		</div>
            
             @if(isset($cars))
             @foreach($cars as $car)
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="carModel">
                        <img src="{{URL::asset('assets/img/jaguar_1.png') }}">
                        <h1>{{$car->name_ar}}</h1>
                        <select name="carModelId" class="form-control" class="carModelId">
                            <option value="0">إختار الموديل</option>
                            @if(isset($carsModelMan))
                                @foreach($carsModelMan as $carsModelM)
                                    @if($carsModelM->car_id == $car->id)
                                    <option value="{{$carsModelM->id}}">{{$carsModelM->car_model_main_name_ar}}</option> 
                                    @endif
                                @endforeach
                            @endif
                            
                        </select>
                        <a href="ar/offers"><button class="btn btn-primary nnn" id="nnn"> اختيار</button></a>
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
    
     <script>
            $('.nnn').on('click', function(e){
                e.preventDefault();
                var url = $(this).attr('href');
                
                var carModelId= $(this).parent().parent().children().eq(2).val();
//                var carModelId = $('.carModelId').val();
                if( carModelId && carModelId !=0 && carModelId !='0' ){
                    window.location.href = 'ar/offers/'+carModelId;
                }  else {
                    alert('الرجاء اختيار نوع السيارة');
                }
            });
            </script>
            
</body>
</html>