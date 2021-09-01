<!doctype html>
<html lang="en">
<head>
    @if(View::hasSection('css'))
        @yield("css")
    @else
        <meta charset="utf-8" />
        <title>Hoàng Hải Company - Short Url</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
{{--        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />--}}
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

        <!-- App css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css"/>
        <style>
            body, label{
                font-family: "Arial"!important;
            }
            .btn-custom {
                background-color: #c51e2c!important;
                border-color: #c51e2c!important;
            }
            .page-item.active .page-link{
                background-color: #c51e2c!important;
                border-color: #c51e2c!important;
            }

        </style>
        <script src="{{asset('assets/js/modernizr.min.js')}}"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-N55BZFMYNJ"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'G-N55BZFMYNJ');
        </script>
    @endif
</head>


<body>

<!-- Begin page -->
<div id="wrapper">

    <!-- ========== Left Sidebar Start ========== -->

@if(View::hasSection('sidebar'))
        @yield('left-sidebar')
@else
        <div class="left side-menu">

            <div class="slimscroll-menu" id="remove-scroll">

                <!-- LOGO -->
                <div class="topbar-left" style="padding-left: 0px">
                    <a href="{{route('shortlink')}}" class="logo">
                            <span>
                                <img src="{{asset('assets/logo.png')}}" alt="" style="width: 100%">
                            </span>
                        <i>
                            <img src="{{asset('assets/logo.png')}}" alt="" height="28">
                        </i>
                    </a>
                </div>

                <!-- User box -->
                <div class="user-box">
                    <div class="user-img">
                        <img src="{{asset('assets/images/users/avatar-1.jpg')}}" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid">
                    </div>
                    <h5><a href="#">Admin</a> </h5>
                    <p class="text-muted">Tạo shortlink</p>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul class="metismenu" id="side-menu">

                        <!--<li class="menu-title">Navigation</li>-->

                        <li>
                            <a href="{{route('shortlink')}}">
                                <i class="fi-layers"></i><span class="badge badge-danger badge-pill float-right">1</span> <span> Short Link </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('visitor.manage')}}">
                                <i class="fi-bar-graph-2"></i><span class="badge badge-danger badge-pill float-right">1</span> <span> Visitor </span>
                            </a>
                        </li>
                    </ul>

                </div>
                <!-- Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
@endif
    <!-- Left Sidebar End -->



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    @yield('content-page')

    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->



</body>
@if(View::hasSection('js'))
    @yield("js")
@else
    <!-- jQuery  -->
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/js/metisMenu.min.js')}}"></script>
        <script src="{{asset('assets/js/waves.js')}}"></script>
        <script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>

        <!-- Flot chart -->
        <script src="{{asset('assets/plugins/flot-chart/jquery.flot.min.js')}}"></script>
        <script src="{{asset('assets/plugins/flot-chart/jquery.flot.time.js')}}"></script>
        <script src="{{asset('assets/plugins/flot-chart/jquery.flot.tooltip.min.js')}}"></script>
        <script src="{{asset('assets/plugins/flot-chart/jquery.flot.resize.js')}}"></script>
        <script src="{{asset('assets/plugins/flot-chart/jquery.flot.pie.js')}}"></script>
        <script src="{{asset('assets/plugins/flot-chart/jquery.flot.crosshair.js')}}"></script>
        <script src="{{asset('assets/plugins/flot-chart/curvedLines.js')}}"></script>
        <script src="{{asset('assets/plugins/flot-chart/jquery.flot.axislabels.js')}}"></script>

        <!-- KNOB JS -->
        <!--[if IE]>
        <script src="{{asset('assets/plugins/jquery-knob/excanvas.js')}}"></script>
        <![endif]-->
        <script src="{{asset('assets/plugins/jquery-knob/jquery.knob.js')}}"></script>

        <!-- Dashboard Init -->
        <script src="{{asset('assets/pages/jquery.dashboard.init.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('assets/js/jquery.core.js')}}"></script>
        <script src="{{asset('assets/js/jquery.app.js')}}"></script>
@endif
</html>
