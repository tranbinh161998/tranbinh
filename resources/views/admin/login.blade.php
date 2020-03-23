@extends('partial.layOutLogin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-group">
                <div class="card p-4" style="opacity: 90%;">
                    <div class="card-body">
                        <h1>Đăng nhập</h1>
                        <p class="text-muted">Đăng nhập vào tài khoản của bạn</p>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend"><span class="input-group-text">
                            <i class="far fa-user" style="text-align: center;"></i></span></div>
                            <input id="userNameLogin" class="form-control" type="text" placeholder="Tài khoản">
                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend"><span class="input-group-text">
                            <i class="fas fa-lock"></i></span></div>
                            <input id="passwordLogin" class="form-control" type="password" placeholder="Mật khẩu">
                        </div>
                        <div id="loginError" class="mb-4" style="display: none;">
                            <p class="text-white" style="background: #cc4125; padding: 5px; text-align: center; border-radius: 3px; opacity: 70%;">Sai tài khoản hoặc mật khẩu!</p>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button onclick= "login();" class="btn btn-primary px-4" type="button">Đăng nhập</button>
                            </div>
                            <div class="col-6 text-right">
                                <button class="btn btn-link px-0" type="button">Quên mật khẩu?</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%; opacity: 80%;">
                    <div class="card-body text-center">
                        <div>
                            <h2>Đăng ký</h2>
                            <p>Để đăng nhập được vào trình quản lí admin bạn cần có tài khoản!</p>
                            <a class="btn btn-lg btn-outline-light mt-3" type="button" href="{{url('/')}}/sign">Đăng ký ngay bây giờ!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
       <script src="{{url('/')}}/js/admin/login.js"></script>
@endsection