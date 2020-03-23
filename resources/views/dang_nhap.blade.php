<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/font-css/css./all.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/css/form-dang-ki.css">
</head>
<body>
     <form method='post' action="{{route('login1')}}">
        <div class="form">
            {!! csrf_field() !!}
            <h1>Login form</h1>
            <div class="username form-sub">
                <div class="icon"><i class="far fa-user"></i></div>
                <input type="text" name="username" placeholder="User name">
            </div>
            <div class="password form-sub">
                <div class="icon"><i class="fas fa-key"></i></div>
                <input type="password" name="password" placeholder="Pass word">
            </div>
            <div class="checkbox ">
                <input type="checkbox" name="checkbox">
                <div class="remember"><p>Remember me</p></div>
                <div class="forget"><a href="">Quên mật khẩu?</a></div>
            </div>
            <div class="login">
                <button type="submit">Login</button>
            </div>
            <div class="or">
                <h3>OR</h3>
            </div>
            <div class="connect">
                    <div class="icon-fb"><i class="fab fa-facebook-f"></i></div>
                    <p>Facebook</p>
                    <h4>Twitter</h4>
                    <div class="icon-tw"><i class="fab fa-twitter"></i></div>              
            </div>
        </div>
    </form>
</body>
</html>