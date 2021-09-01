@extends('back-end.template.master')
@section('sidebar')

@endsection
@section('content-page')
    @if(session('user_id') !== null)
        <script>window.location.href = "{{route('shortlink')}}";</script>
    @else
        <body class="account-pages enlarged">
            <!-- Begin page -->
            <div class="accountbg" style="background: url('{{asset('assets/back-ground.png')}}');background-size: cover;background-position: center;"></div>

            <div class="wrapper-page account-page-full" >

                <div class="card">
                    <div class="card-block">
                        <div class="account-box">
                            <div class="card-box p-5">
                                <h2 class="text-uppercase text-center pb-4">
                                        <span><img src="{{asset('assets/logo.png')}}" alt=""></span>
                                </h2>

                                <form class="" method="POST" action="{{route('user.login')}}">
                                    @csrf
                                    <div class="form-group m-b-20 row">
                                        <div class="col-12">
                                            <label for="emailaddress">Email address</label>
                                            <input class="form-control" type="email" name='email' id="emailaddress" required placeholder="Enter your email">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12">
                                            <!-- <a href="page-recoverpw.html" class="text-muted float-right"><small>Forgot your password?</small></a> -->
                                            <label for="password">Password</label>
                                            <input class="form-control" type="password" name="password" required id="password" placeholder="Enter your password">
                                        </div>
                                    </div>

                                    <!-- <div class="form-group row">
                                        <div class="col-12">

                                            <div class="checkbox checkbox-custom">
                                                <input id="remember" type="checkbox" checked="">
                                                <label for="remember">
                                                    Remember me
                                                </label>
                                            </div>

                                        </div>
                                    </div> -->

                                    <div class="form-group row text-center">
                                        <div class="col-12">
                                            <button class="btn btn-block btn-custom waves-effect waves-light" type="submit">Sign In</button>
                                        </div>
                                    </div>

                                </form>

                                <!-- <div class="row m-t-50">
                                    <div class="col-sm-12 text-center">
                                        <p class="text-muted">Don't have an account? <a href="page-register.html" class="text-dark ml-1"><b>Sign Up</b></a></p>
                                    </div>
                                </div> -->

                            </div>
                        </div>

                    </div>
                </div>

                <div class="m-t-40 text-center">
                    <p class="account-copyright">2021 © Sweetsica <span class="d-none d-sm-inline-block"> - Hoàng Hải Company</span></p>
                </div>

            </div>
        </body>
    @endif
@endsection
