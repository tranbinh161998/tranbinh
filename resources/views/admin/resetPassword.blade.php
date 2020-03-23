@extends('partial.layOutAdmin')

@section('content')
<script type="text/javascript" src="{{url('/')}}/js/admin/saveChangePassword.js"></script>
<div class="container">
        <div class="card">
            <div class="card-header"><strong>Đổi mật khẩu</strong></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name">Mật khẩu cũ</label>
                            <input class="form-control" id="passWordOld" name="passWordOld" type="password" placeholder="Mật khẩu cũ">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name">Mật khẩu mới</label>
                            <input class="form-control" name="passwordNew" id="passwordNew" type="password" placeholder="Mật khẩu mới">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="ccnumber">Xác nhận mật khẩu mới</label>
                            <input class="form-control" name="confirmPassword" id="confirmPassword" type="password" placeholder="Xác nhận mật khẩu mới">
                        </div>
                    </div>
                </div>
                <button class="btn btn-sm btn-success" onclick="saveChangePassword()"> Đổi mật khẩu</button>
            </div>
        </div>
</div>
@endsection