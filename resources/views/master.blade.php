<!DOCTYPE html>
<html>
    <head>
        <title>Zayani</title>
        <meta charset="UTF-8">
        <title>Zayani | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="{{ asset("assets/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset("assets/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("assets/css/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />
        @yield('header')
    </head>
    <body class="skin-blue">
        <div class="wrapper">

            <header class="main-header">

                <a href="{{url('admin')}}" class="logo"><b>Admin</b></a>

                <nav class="navbar navbar-static-top" role="navigation">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                    <div class="" style="float: right;">
                        <ul class="">
                            <a href="{{url('logout')}}" class="" >

                                <span class="label">log out</span>
                            </a>

                        </ul>
                    </div>







                </nav>



            </header>
            <aside class="main-sidebar">

                <section class="sidebar">


                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>

                    <ul class="sidebar-menu">
                        <li class="treeview">
                            <a href="{{url('contact')}}"><span>Contact Us</span> <i class="fa fa-angle-left pull-right"></i></a>

                        </li>
                        <li class="treeview">
                            <a href="{{url('cars')}}"><span>Add Cars</span> <i class="fa fa-angle-left pull-right"></i></a>

                        </li>
                        <li class="treeview">
                            <a href="{{url('carsmodelmain')}}"><span>Add Model</span> <i class="fa fa-angle-left pull-right"></i></a>

                        </li>
                        <li class="treeview">
                            <a href="{{url('carsmodel')}}"><span>Add Cars Model Offers</span> <i class="fa fa-angle-left pull-right"></i></a>

                        </li>

                        
                          <li class="treeview">
                            <a href="{{url('carsmodelimg')}}"><span>Upload Cars Model images</span> <i class="fa fa-angle-left pull-right"></i></a>

                        </li>
                        
                          <li class="treeview">
                            <a href="{{url('carsbrand')}}"><span>Add Car Brand</span> <i class="fa fa-angle-left pull-right"></i></a>

                        </li>
                          <li class="treeview">
                            <a href="{{url('carsbrandmodel')}}"><span>Add Car Brand Model</span> <i class="fa fa-angle-left pull-right"></i></a>

                        </li>
                          <li class="treeview">
                            <a href="{{url('valuecarlog')}}"><span>Received Value car </span> <i class="fa fa-angle-left pull-right"></i></a>

                        </li>
                          <li class="treeview">
                            <a href="{{url('testdrivelog')}}"><span>Received Test Drive </span> <i class="fa fa-angle-left pull-right"></i></a>

                        </li>
                          <li class="treeview">
                            <a href="{{url('subscriber')}}"><span>Subscribers </span> <i class="fa fa-angle-left pull-right"></i></a>

                        </li>
                          <li class="treeview">
                            <a href="{{url('contactlog')}}"><span>Received Contact </span> <i class="fa fa-angle-left pull-right"></i></a>

                        </li>
                        
                          <li class="treeview">
                            <a href="{{url('contvaluslider')}}"><span>contactus and valuecar slider</span> <i class="fa fa-angle-left pull-right"></i></a>

                        </li>
                        
                        
                         
                      
                    </ul>
                </section>
            </aside>

            <div class="content-wrapper">
                <section class="content-header">
                    <h1>
                        @yield('page_title')
                    </h1>

                </section>

                <section class="content">
                    @yield('content')
                </section>
            </div>

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    
                </div>
             
            </footer>

        </div>
        <script src="https://code.jquery.com/jquery-1.12.3.js"></script>
        <script src="{{ asset ("assets/js/bootstrap.min.js") }}" type="text/javascript"></script>
        <script src="{{ asset ("assets/js/app.min.js") }}" type="text/javascript"></script>
        @yield('scripts')
    </body>
</html>