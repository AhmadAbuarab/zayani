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

                                <a href="{{ URL::to("ar") }}" class="mainLogo"><img src="{{URL::asset('assets/img/logo.png') }}"></a>

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
                        <div class="fill" style="background-image:url({{URL::asset($offerImage->path_slider) }});"></div>
                        <div class="carousel-caption">
                        </div>
                    </div>
                    @else

                    <div class="item">
                        <!-- Set the second background image using inline CSS below. -->
                        <div class="fill" style="background-image:url({{URL::asset($offerImage->path_slider) }});"></div>
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

                <div class="col-md-8 col-sm-6 col-xs-12">

                    {!! Form::open(['url' => 'testcaraddlog/create']) !!}
                    <input name="id" type="hidden" value="{{$carsModelData[0]->id}}" >
                    <div class="col-md-6 col-sm-12 col-xs-12 {{ $errors->has('last_name') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="exampleInputName2">الاسم الاخير</label>
                            <input type="text" class="form-control" name="last_name" id="exampleInputName2" placeholder="الاسم الاخير">
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12 col-xs-12 {{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="exampleInputName2">الاسم الاول</label>
                            <input type="text" name="first_name" class="form-control" id="exampleInputName2" placeholder="الاسم الاول">
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12 {{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="exampleInputName2">البريد الالكتروني</label>
                            <input name="email" type="email" class="form-control" id="exampleInputName2" placeholder="البريد الالكتروني">
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12 {{ $errors->has('phone_number') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="exampleInputName2">رقم الهاتف</label>
                            <input name="phone_number" type="phone" class="form-control phone_number" id="exampleInputName2" placeholder="رقم الهاتف" value="00965">
                        </div>
                    </div>


                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputName2">أفضل وقت للإتصال</label>
                            <input type="text" name="best_time_to_contact" class="form-control" id="exampleInputName2" placeholder="أفضل وقت للإتصال">
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12 {{ $errors->has('message') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="message">الرسالة</label>
                            <textarea name="message" class="form-control" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <button type="submit" class="btn btn-primary">إرسال <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                    </div>
                    </form>
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