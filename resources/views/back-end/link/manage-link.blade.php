@extends('back-end.template.master')
@section('css')
    <meta charset="utf-8"/>
    <title>Tạo link rút gọn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.1/css/dataTables.dateTime.min.css"/>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css"/>

    <script src="{{asset('assets/js/modernizr.min.js')}}"></script>
    <style>
        body, label, h4{
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
@endsection
@section("js")
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>
    <script src="{{asset('assets/js/modernizr.min.js')}}"></script>

    <script type="text/javascript" >
        var yourTable= $('#datatable-buttons').DataTable({
            pageLength: 20,
            lengthMenu: [0, 5, 10, 20, 50, 100, 200, 500],
        });
    </script>


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
                            <h4 class="page-title">Tạo link rút gọn </h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                <li class="breadcrumb-item active">Rút gọn link</li>
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
                    <div class="col-lg-12">
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                <p>{{ Session::get('success') }}</p>
                            </div>
                        @endif

                        <div class="card-box">
                            <h4 class="header-title">Tạo shortlink</h4>
                            <p class="text-muted">
                                Nhập các thông tin bên dưới để tạo thành link rút gọn, điền đầy đủ như mẫu là tốt nhất
                            </p>
                            <div class="col-lg-6">
                                <form role="form" method="POST" action="{{route('generate-shorten-link.post')}}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-4 col-form-label">Tên gợi nhớ<span
                                                class="text-danger">*</span></label>
                                        <div class="col-7">
                                            <input type="text" name="name_camp" required parsley-type="email"
                                                   class="form-control"
                                                   id="inputEmail3">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="hori-pass1" class="col-4 col-form-label">Đường link gốc<span
                                                class="text-danger">*</span></label>
                                        <div class="col-7">
                                            <input id="hori-pass1" type="url" parsley-type="url" name="link"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="hori-pass2" class="col-4 col-form-label">Hậu tố 1<span
                                                class="text-danger">*</span></label>
                                        <div class="col-7">
                                            <input type="text" name="path1" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="hori-pass2" class="col-4 col-form-label">Hậu tố 2</label>
                                        <div class="col-7">
                                            <input type="text" name="path2" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="hori-pass2" class="col-4 col-form-label">Hậu tố 3</label>
                                        <div class="col-7">
                                            <input type="text" name="path3" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-8 offset-4">
                                            <button type="submit" class="btn btn-custom waves-effect waves-light mr-1">
                                                Tạo link theo dõi
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
                <!-- data table row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <h4 class="header-title">List link</h4>
                            <table id="datatable-buttons"
                                   class="table table-striped table-bordered dt-responsive nowrap"
                                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Tổng số truy cập</th>
                                    <th>Số người truy cập hôm qua</th>
                                    <th>Short Url</th>
                                    <th>Ngày tạo</th>
{{--                                    <th>Action</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                    @if(isset($link_datas))
                                        @foreach($link_datas as $row)
                                            <tr>
                                                <td>{{ $row->id }}</td>
                                                <td>{{ $row->name_camp }}</td>
                                                <th>{{$row->total_visitors_count}}</th>
                                                <th>{{ $row->yesterday_visitors_count }}</th>
                                                <td><a href="{{$row->ShortLink->code}}">{{$_SERVER['SERVER_NAME']}}/{{$row->ShortLink->code}}</a></td>
{{--                                                <td><a href="{{route('shortlink.delete',['id'=>$row->id])}}" data-method="delete" data-confirm="Are you sure to delete this inventory?">-- Xoá --</a></td>--}}
                                                <th>{{ $row->created_at->format('d/m/Y') }}</th>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div> <!-- container -->
        </div> <!-- content -->

        <footer class="footer">
            2021 © Sweetsica <span class="d-none d-sm-inline-block"> - Hoàng Hải Company</span>
        </footer>

    </div>
@endsection
