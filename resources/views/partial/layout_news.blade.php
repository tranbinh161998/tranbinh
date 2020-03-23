<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
         <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <title>Binh HTML Template</title>

        <!-- Google font -->
        <script src="{{url('/')}}/css/js/jquery.min.js"></script>
        <link href="{{url('/')}}/css/css/font-google.css" rel="stylesheet"> 
        <link href="{{url('/')}}/css/css/swap.css">
        <!-- Bootstrap -->
        <link type="text/css" rel="stylesheet" href="{{url('/')}}/css/css/bootstrap.min.css"/>

        <!-- Font Awesome Icon -->


        <!-- Custom stlylesheet -->
        <link type="text/css" rel="stylesheet" href="{{url('/')}}/css/css/style.css"/>

             <!-- css của bình -->
        <link type="text/css" rel="stylesheet" href="{{url('/')}}/css/css/animation.css"/>
        <link rel="stylesheet" href="{{url('/')}}/css/owl.carousel.min.css">
        <link rel="stylesheet" href="{{url('/')}}/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="{{url('/')}}/css/font-css/css/all.css">
        <script src="{{url('/')}}/css/js/owl.carousel.min.js"></script>
        <!-- Tweenmax -->
        <script src="{{url('/')}}/js/gsap.min.js"></script>
        <!-- animation scroll -->
        <script type="text/javascript">
            $(window).load(function(){
            $('#loading').fadeOut(50).remove();
        })
        </script>


        <script>
            var adminUrl_layout = "{!! url('/') !!}";
            var openModal = true;
        </script>

        @php

            $nd_tl = \App\models\category::all();
            $cat = 1;
        @endphp

    </head>
    <body>
    <a style="z-index:10001;" href="" id="return-to-top"><i class="fas fa-chevron-up"></i></a>

    <i style="z-index:10000;" class="fas fa-chevron-up"></i>
         <div id="loading"><img src="{{url('/')}}/css/img/golden.svg"></div>
             <header id="header">
                <div id="nav" class="">
                    <div id="nav-fixed" class="slide-down">
                        <div class="container">
                            <div class="nav-logo">
                                <a style="width: 50px; height: 50px;" href="{{url('/')}}" class="logo"><img src="{{url('/')}}/image/logobt.png" alt=""></a>
                            </div>
                            <ul class="nav-menu nav navbar-nav">
                                @foreach($nd_tl as $key=>$value)
                                <li class="btb"><a href="{{url('/')}}/detailListNews/{{$value->slug}}-{{$value->id}}.html">{{$value->name}}</a></li>
                                @endforeach
                                <!-- có thể thay thành class cat-{{$value->id}} -->
                            </ul>
                            <div  id="navB" class="nav-btns">
                                <button class="aside-btn"><i class="fa fa-bars"></i></button>
                            </div>
                            <div class="nav-btns nav-logo" style="float: right; margin-left: 15px;margin: auto 0px;">
                             @if(Auth::guard('admin_news2')->check())
                              <li  style=" width: 70px; list-style-type: none; float: left; margin-top: 20%; " class="nav-item dropdown "> <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> <img style="width: 35px; height: 35px; border-radius: 35px;" class="img-avatar" src="{{url('/')}}/css/img/avatar1.jpg" alt="admin@bootstrapmaster.com"> </a>
                               <div class="dropdown-menu dropdown-menu-right" style=" width: 250px;"> 
                                <div style="background: #999;" class="dropdown-header text-center"> <strong style="font-size: 25px; color: #333; ">Tài Khoản</strong> </div>
                                 <a style="margin-left: 15px; margin-top: 8px; font-size: 15px;" class="dropdown-item" href="{{route('form_insert')}}"> <i class="fas fa-folder-plus"></i> Viết bài</a><br>
                                  <a  style="margin-left: 15px; margin-top: 8px; font-size: 15px;" class="dropdown-item" href="{{url('/')}}/list_news"> <i id="number_news" class="fas fa-edit"></i> Chỉnh sửa bài viết của bạn </a><br> 
                                  <a style="margin-left: 15px; margin-top: 8px; font-size: 15px;" class="dropdown-item" href="{{route('logout')}}"> <i class="fas fa-sign-out-alt"></i> Đăng xuất</a> 
                              </div>
                                </li>
                                @endif
                                 </div>
                        </div>
                    </div>
                        <div id="nav-aside" class="">
                            <div class="section-row">
                                <ul class="nav-aside-menu">
                                    @foreach ( $nd_tl as $key=>$value)
                                    <li><a href="{{url('/')}}/detailListNews/{{$value->slug}}-{{$value->id}}.html">{{$value->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <button class="nav-aside-close"><i class="fa fa-times"></i></button>
                        </div>
                    </div>

                </header>
        @yield('content')
        <footer id="footer" style="margin-top: 0px;">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-5">
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <a href="index.html" class="logo"><img src="{{url('/')}}/css/img/logo.png" alt=""></a>
                            </div>
                            <ul class="footer-nav">
                                
                                @if(Auth::guard('admin_news2')->check())
                                    <b style="color: #999; font-style: calibri;">
                                     {{"Xin chào ".Auth::guard('admin_news2')->user()->lastName}}<br>
                                     <a href=""></a>
                                    <a href="{{route('logout')}}">
                                         {{"Đăng xuất "}}   
                                    </a>
                                    </b>
                                @else
                                
                                
                                    <li><a href="{{url('/')}}/login">Đăng nhập</a></li>

                                    <li><a href="{{url('/')}}/sign">Đăng ký</a></li>
                                    @endif
                            </ul>
                            
                            <div class="footer-copyright">
                                <span>&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template designed by Bình Boong's<i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="footer-widget">
                                    <h3 class="footer-title">Giới thiệu</h3>
                                    <ul class="footer-links">
                                        <li><a href="about.html">About Us</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="footer-widget">
                                    <h3 class="footer-title">Thể loại</h3>
                                    <ul class="footer-links">
                                        @foreach($nd_tl as $key => $value)
                                            <li><a href="#">{{$value->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </footer>
        <div class="li-post-group:last" style="  width: 100%; max-height:370px; overflow: hidden;" >
            <img id="imageAnimation"   src="{{url('/')}}/css/img/opera.png">
        </div>
        <!-- /Footer -->

        <!-- jQuery Plugins -->
        <script src="{{url('/')}}/css/js/bootstrap.min.js"></script>
        <script src="{{url('/')}}/css/js/main.js"></script>
        <script src="{{url('/')}}/ckeditor/ckeditor.js"></script>



        <!-- js creater -->
        <script src="{{url('/')}}/js/validate_dangky.js"></script>
        <script src="{{url('/')}}/js/scroll.js"></script>

        <script src="https://unpkg.com/scrollreveal"></script>

        <!-- jquery tags -->
    </body>
</html>