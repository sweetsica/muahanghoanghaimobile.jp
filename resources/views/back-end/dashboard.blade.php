@extends('back-end.template.master')
@section('css')
    <meta charset="utf-8" />
    <title>Highdmin - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- App css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css"/>

    <script src="assets/js/modernizr.min.js"></script>
@endsection
@section('js')
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
@endsection
@section('content-page')
    <div class="content-page">
        <!-- Top Bar Start -->
        <div class="topbar">
            <nav class="navbar-custom">

                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <button class="button-menu-mobile open-left disable-btn">
                            <i class="dripicons-menu"></i>
                        </button>
                    </li>
                    <li>
                        <div class="page-title-box">
                            <h4 class="page-title">Trang chủ </h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">Welcome to Hoàng Hải JP admin panel !</li>
                            </ol>
                        </div>
                    </li>

                </ul>

            </nav>

        </div>
        <!-- Top Bar End -->



        <!-- Start Page content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="header-title mb-4">Tổng quan 24h</h4>
                            <div class="row">
                                <div class="col-md-6  col-xl-3">
                                    <div class="card-box mb-0 widget-chart-two">
                                        <div class="widget-chart-two-content">
                                            <p class="text-muted mb-0 mt-2">Lượng truy cập</p>
                                            <h3 class="">{{$analyticsData['VisitCount']}}</h3>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6  col-xl-3">
                                    <div class="card-box mb-0 widget-chart-two">
                                        <div class="widget-chart-two-content">
                                            <p class="text-muted mb-0 mt-2">Lượng truy cập mới</p>
                                            <h3 class="">{{$analyticsData['VisitorType']['0']['1']}}</h3>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6  col-xl-3">
                                    <div class="card-box mb-0 widget-chart-two">
                                        <div class="widget-chart-two-content">
                                            <p class="text-muted mb-0 mt-2">Lượng truy cập trở lại</p>
                                            <h3 class="">{{$analyticsData['VisitorType']['1']['1']}}</h3>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-xl-6">
                        <div class="card-box">
                            <h4 class="header-title mb-3">Top 10 đường link được truy cập nhiều nhất</h4>

                            <div class="table-responsive">
                                <table class="table table-hover table-centered m-0">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Name</th>
                                        <th>Truy cập 24h qua</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($analyticsData['top_referrers_today'] as $key => $data)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$data['url']}}</td>
                                            <td>{{$data['pageViews']}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                    <div class="col-xl-6">
                        <div class="card-box">
                            <h4 class="header-title mb-3">Top 10 thành phố được truy cập nhiều nhất</h4>

                            <div class="table-responsive">
                                <table class="table table-hover table-centered m-0">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên thành phố</th>
                                        <th>Số lần truy cập 7 ngày qua</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($analyticsData['city'] as $key => $data)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$data['0']}}</td>
                                            <td>{{$data['1']}}</td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                    <div class="col-xl-6">
                        <div class="card-box">
                            <h4 class="header-title mb-3">Top 10 trang được truy cập nhiều nhất</h4>
                            <div class="table-responsive">
                                <table class="table table-hover table-centered m-0">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Đường dẫn trang</th>
                                        <th>Số lần truy cập 7 ngày qua</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($analyticsData['screenPageViews'] as $key => $data)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$data['0']}}</td>
                                            <td>{{$data['1']}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="card-box">
                            <h4 class="header-title mb-3">10 Trang link rút gọn gần đây</h4>
                            <div class="table-responsive">
                                <table class="table table-hover table-centered m-0">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên chiến dịch</th>
                                        <th>Đường link</th>
                                        <th>Số lần truy cập 24h qua</th>
                                    </tr>
                                    </thead>
                                    <tbody>
{{--                                    @dd($analyticsData['VisitorCollect'])--}}
                                    @foreach($analyticsData['VisitorCollect'] as $key => $data)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$data['name_camp']}}</td>
                                            <td>{{$data['link_final']}}</td>
                                            <td>{{$data['today_visitors_count']}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div> <!-- container -->
        </div> <!-- content -->
        <footer class="footer">
            2018 - 2019 © Highdmin. <span class="d-none d-sm-inline-block"> - Coderthemes.com</span>
        </footer>
    </div>
@endsection