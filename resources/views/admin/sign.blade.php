@extends('partial.layOutLogin')

@section('content')
<div class="row justify-content-center" style="opacity: 90%;">
    <div class="col-md-6">
        <div class="card mx-4">
            <div class="card-body p-4">
                <h1>Đăng ký</h1>
                <p class="text-muted">Tạo tài khoản</p>
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text">
                    <i class="fas fa-user-plus"></i></span></div>
                    <input class="form-control" type="text" id="userName" name="username" placeholder="Tên đăng nhập">
                </div>
                    <p class="text-white userNameError" style="background: #cc4125; padding: 5px; text-align: center; border-radius: 3px; opacity: 70%; display: none;"> Tài khoản quá ngắn</p>
                    <p class="text-white accountError" style="background: #cc4125; padding: 5px; text-align: center; border-radius: 3px; opacity: 70%; display: none;"> Tài khoản đã tồn tại, vui lòng thử tài khoản khác!</p>
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text">
                    <i class="fas fa-pen-alt"></i></div>
                    <input class="form-control" type="text" id="lastName" name="lastName" placeholder="Tên của bạn">
                </div>
                <p class="text-white lastNameError" style="background: #cc4125; padding: 5px; text-align: center; border-radius: 3px; opacity: 70%; display: none;"> Tên của bạn quá ngắn, vui lòng thử lại!</p>
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text">
                    <i class="fas fa-feather-alt"></i></div>
                    <input class="form-control" type="text" id="firstName" name="firstName" placeholder="Họ của bạn">
                </div>
                <p class="text-white firstNameError" style="background: #cc4125; padding: 5px; text-align: center; border-radius: 3px; opacity: 70%; display: none;"> Họ của bạn quá ngắn, vui lòng thử lại!</p>
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text">
                    <i class="fas fa-lock"></i></span></div>
                    <input class="form-control" type="password" id="password" name="password" placeholder="Mật khẩu">
                </div>
                <p class="text-white passwordError" style="background: #cc4125; padding: 5px; text-align: center; border-radius: 3px; opacity: 70%; display: none;">Mật khẩu quá ngắn , vui lòng thử lại!</p>
                <div class="input-group mb-4">
                    <div class="input-group-prepend"><span class="input-group-text">
                    <i class="fas fa-key"></i></span></div>
                    <input class="form-control" type="password" id="re_password" name="re_password" placeholder="Nhập lại mật khẩu">
                </div>
                <p class="text-white Re_password_error" style="background: #cc4125; padding: 5px; text-align: center; border-radius: 3px; opacity: 70%; display: none;"> Nhập lại mật khẩu sai , vui lòng thử lại!</p>
                <button class="btn btn-block btn-success" onclick="validateSubmit();" type="button">Đăng ký</button>
            </div>
        </div>
    </div>
</div>

<script src="{{url('/')}}/js/validate_dangky.js"></script>
@endsection