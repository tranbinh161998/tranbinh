<!DOCTYPE html>
<html>
<head>
    <title>Binh boong's learning</title>
    <link rel="stylesheet" type="text/css" href="{{url('tem_web')}}/index.css">
    <LINK REL="SHORTCUT ICON"  HREF="{{url('tem_web')}}/logo-header.png">
    <link rel="stylesheet" type="text/css" href="{{url('tem_web')}}/font-css/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="https://dt247.vn/tempDT247/images/homePage/logo.png">
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{route('home')}}">Trang chủ</a>
                    <ul class="support-menu">
                        <li><a href="#">Trang chủ 1</a></li>
                        <li><a href="#">Trang chủ 2</a></li>
                        <li><a href="#">Trang chủ 3</a></li>
                        <li><a href="#">Trang chủ 4</a></li>
                        <li><a href="#">Trang chủ 5</a></li>
                    </ul>
                </li>
                <li><a href="#">Thông tin</a></li>
                <li><a href="#">Sản phẩm nổi bật</a></li>
                <li><a href="#">Liên hệ</a></li>
                <li><a href="{{route('gioithieu')}}">Giới thiệu</a></li>
            </ul>
        </div>
        <div class="search-bar">
            <form method="get" action="#" >
                <input type="text" name="search" placeholder="Tìm kiếm" class="search-box">
                <button class="button-search" type="submit"><i class="fas fa-search button"></i></button>
            </form>
        </div>
    </div>
    <div class="banner">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100 img" src="{{url('tem_web')}}/anh5.jpg" alt="First slide">
                  <div class="carousel-caption d-none d-md-block">
                    <h5 class="main-tittle">Binhtran.com</h5>
                    <p class="sub-tittle">Đặt hàng nhanh và tiện lợi<p>
                  </div>
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100 img" src="{{url('tem_web')}}/anhok.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100 img" src="{{url('tem_web')}}/anh2.jpg" alt="Third slide">
                </div>
                </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
            </div>
    <div class="quytrinh">
        <p>Quy trình nhập hàng trung quốc</p>
    </div>
    <div class="steps-taken">
        <ul>
            <li><img src="{{url('tem_web')}}/buoc1.png"></li>
            <li><img src="{{url('tem_web')}}/buoc2.png"></li>
            <li><img src="{{url('tem_web')}}/buoc3.png"></li>
            <li><img src="{{url('tem_web')}}/buoc4.png"></li>
            <li><img src="{{url('tem_web')}}/buoc5.png"></li>
        </ul>

    



    @yield('content')




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>

