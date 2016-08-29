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
        <meta name="csrf_token" content="{!! csrf_token() !!}"/>

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


        @if(isset($contactUsSliders[0]->value_slider_arabic) && $contactUsSliders[0]->value_slider_arabic != '')
        <div class="container-fulid">
            <header id="myCarousel" class="carousel slide">
                <!-- Indicators -->

                <!-- Wrapper for Slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <!-- Set the first background image using inline CSS below. -->
                        <div class="fill_inner" style="background-image:url({{URL::asset($contactUsSliders[0]->value_slider_arabic)}});"></div>
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
                        <h1>قيم سيارتك</h1>
                        <span>وفي الزياني، ونحن بسعادة نلقي نظرة على سيارتك وتوفر لك مع التجارة في س إيه على واحدة من سياراتنا. لا تتردد إلى   النموذج أدناه وسوف يقوم عضوا من فريقنا بالاتصال بك قريبا.</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-horizontal">
                    {!! Form::open(['url' => 'valuecaraddlog/create']) !!}

                    <div class="col-md-4 col-sm-4 col-xs-12 {{ $errors->has('phone_number') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="exampleInputName2">رقم الهاتف</label>
                            <input type="phone" name="phone_number" class="form-control phone_number" id="exampleInputName2" placeholder="رقم الهاتف" value="+965 ">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 {{ $errors->has('last_name') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="exampleInputName2">الاسم الاخير</label>
                            <input type="text" name="last_name" class="form-control" id="exampleInputName2" placeholder="الاسم الاخير">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 {{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="exampleInputName2">الاسم الاول</label>
                            <input type="text" name="first_name" class="form-control" id="exampleInputName2" placeholder="الاسم الاول">
                        </div>
                    </div>



                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputName2">سنة الملكية</label>
                            <select class="form-control" name="ownership_year"  id="exampleInputName2">
                                <option>اختيار</option>
                                <?php
                                for ($x = 1990; $x <= 2017; $x++) {
                                    ?>
                                    <option  value="<?php echo $x; ?>"><?php echo $x ?></option>
                                    <?php
                                }
                                ?>
                            </select>


                            <!--<input type="text"  name="ownership_year" class="form-control" id="exampleInputName2" placeholder="ملكية السنة">-->
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputName2">أفضل وقت للإتصال</label>
                            <input type="text" name="best_time_to_contact" class="form-control" id="exampleInputName2" placeholder="أفضل وقت للإتصال">
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 {{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="exampleInputName2">البريد الالكتروني</label>
                            <input type="email" name="email" class="form-control" id="exampleInputName2" placeholder="البريد الالكتروني">
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="Specification_title">
                            <h1>مواصفات السيارة</h1>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label for="bodyCondition">حالة جسم المركبة</label>
                            <select name="body_condition" class="form-control">
                                <option value="Excellent">ممتاز</option>
                                <option value="Very Good">جيد جدا</option>
                                <option value="Good">جيد</option>
                                <option value="bad">مقبول</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label for="year">السنة</label>
                            <select name="year" class="form-control">
                                <option>اختر السنة</option>
                                <?php
                                for ($x = 1980; $x <= 2016; $x++)
                                    echo '<option value=' . $x . '>' . $x . '</option>';
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label for="model_id">الموديل</label>
                            <select name="model_id" class="form-control model_id">
                                <option>اختر الموديل</option>

                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label for="model_id">النوع</label>
                            {!! Form::select('brand_id', $carsBran , '' ,['class'=>'form-control brand_id']) !!}
                        </div>
                    </div>



                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label for="geer_condition">حالة الجير</label>
                            <select name="gear_condition" class="form-control">
                                <option value="Excellent">ممتاز</option>
                                <option value="Very Good">جيد جدا</option>
                                <option value="Good">جيد</option>
                                <option value="bad">مقبول</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label for="mileage">عدد الأميال</label>
                            <select name="mileage" class="form-control">
                                <option value="0 to 20000">0-20000</option>
                                <option value="20000 to 40000">20000-40000</option>
                                <option value="40000 to 60000">40000-60000</option>
                                <option value="60000 to 80000" >60000-80000</option>
                                <option value="more than 80000">اكثر من 80000</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label for="ac_condition">حالة المكيف</label>
                            <select name="ac_condition" class="form-control">
                                <option value="Excellent">ممتاز</option>
                                <option value="Very Good">جيد جدا</option>
                                <option value="Good">جيد</option>
                                <option value="bad">مقبول</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label for="engineCondition">حالة المحرك</label>
                            <select name="engine_condition" class="form-control">
                                <option value="Excellent">ممتاز</option>
                                <option value="Very Good">جيد جدا</option>
                                <option value="Good">جيد</option>
                                <option value="bad">مقبول</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12">
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
            $(document).ready(function () {
                var readOnlyLength = $('.phone_number').val().length;

                $('.phone_number').on('keypress, keydown', function (event) {
                    if ((event.which != 37 && (event.which != 39))
                            && ((this.selectionStart < readOnlyLength)
                                    || ((this.selectionStart == readOnlyLength) && (event.which == 8)))) {
                        return false;
                    }
                });

                $('.brand_id').change(function () {
                    var str = '';
                    var brandId = $(this).val();
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: './getCarBrandModel',
                        beforeSend: function (xhr) {
                            var token = $('meta[name="csrf_token"]').attr('content');

                            if (token) {
                                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                            }
                        },
                        data: {brandId: brandId},
                        success: function (data) {
                            $(".model_id").html('');
                            $.each(data, function (k, v) {
                                str = str + '<option value=' + v.id + '>' + v.name_ar + '</option>';
                            });
                            $(str).appendTo(".model_id");
                        }
                    })
                });
            });
        </script>
    </body>
</html>