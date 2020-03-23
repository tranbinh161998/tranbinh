<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.1.11
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="keyword" content="Admin-Bình,tin tức,thực tập, demo bình">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Admin-Bình Trần</title>
    <!-- Icons-->
    <!-- <script src="{{url('/')}}/css/js/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="{{url('/')}}/js/sweet.js"></script>
    <link href="{{url('/')}}/css/admin/flag-icon.min.css" rel="stylesheet">
    <link href="{{url('/')}}/css/admin/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/')}}/css/font-css/css/all.css">
    <link href="{{url('/')}}/css/admin/simple-line-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/')}}/css/admin/loadAnimation.css">
    
    <!-- buttonCss -->
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/css/css/buttonLibrary.css">
    <!-- tags -->
    <link rel="stylesheet" href="{{url('/')}}/css/css/tags/inputTag.css">
    <script src="{{url('/')}}/js/tags/tag-input.js"></script>

    <!-- Main styles for this application-->
    <link href="{{url('/')}}/css/admin/style.css" rel="stylesheet">
    <link href="{{url('/')}}/css/admin/pace.min.css" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script  src="{{url('/')}}/js/admin/js.js"></script>
    <script src="{{url('/')}}/js/jquery.form.js"></script>
    <script>
        var adminUrl_layout = "{!! url('/') !!}";
    </script>
    @php
        $nd_tl = \App\models\category::all();
        $cat = 1;
    @endphp
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>
  </head>
  <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show ">


    <!-- phần hiệu ứng load trang... -->
      <img id="loadingImage" src="{{url('/')}}/css/img/golden.svg">
      <div id="background">
      </div>
      <script >
        $(window).on("load",function(){
            $("#loadingImage").fadeOut("alow");
            $("#background").fadeOut("alow");
          });
    </script>

    <!-- endload animation -->
    <header class="app-header navbar">
      <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <ul class="nav navbar-nav ml-auto">
      
      <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <span class="badge badge-pill badge-danger">5</span>
          <i class="fab fa-facebook-messenger"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" style="width: 500px;">
            <div class="dropdown-header text-center">
              <strong>Message</strong>
            </div>
              <!-- message              -->
              <a class="dropdown-item" style="height: 78px;" href="#">
                <div class="message">
                  <div class="py-3 mfe-3 float-left">
                    <div class="c-avatar"><img style="width:36px; border-radius:36px;" class="c-avatar-img" src="{{url('/')}}/image/avata.jpg" alt="user@email.com"><span class="c-avatar-status bg-success"></span><span class="c-avatar-status bg-success"></span></div>
                  </div>
                  <div><small class="text-muted float-right mt-1">Just now</small></div>
                  <div class="text-truncate font-weight-bold"><span class="text-danger">!</span> Important message</div>
                  <div class="small text-muted text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididuntfdgdfgdfgdgdfgdfgdfgdfgdgdfgdfg...</div>
                </div>
              </a>
              <!-- end message -->
<a class="dropdown-item text-center border-top" href="#"><strong>Xem tất cả tin nhắn</strong></a>
          </div>
          <div class="dropdown-menu dropdown-menu-right">
          </div>
        </li>
        <li class="nav-item d-md-down-none">
          <a class="nav-link">
            <i class="far fa-bell"></i></i>
            <span class="badge badge-pill badge-danger">5</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <img class="img-avatar" src="{{url('/')}}/image/avata.jpg" alt="admin@bootstrapmaster.com">
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-header text-center">
              <strong>{{Auth::guard('admin_news2')->user()->firstName. " " .Auth::guard('admin_news2')->user()->lastName}}</strong>
            </div>
            <a  href="{{url('/')}}/resetPassword" class="dropdown-item" >
              <i class="fas fa-key"></i> Đổi mật khẩu</a>
            <a  class="dropdown-item" href="{{route('logout')}}">
              <i class="fa fa-lock"></i> Đăng xuất</a>
          </div>
        </li>
      </ul>
    </header>
    <div class="app-body">
      <div class="sidebar">
        <nav class="sidebar-nav">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="index.html">
                <i class="fas fa-plus"></i> Thêm tính năng
                <span class="badge badge-danger">NEW</span>
              </a>
            </li>
            <li class="nav-title">Chức năng</li>
            <li class="nav-item nav-dropdown">
              <a href="" class="nav-link nav-dropdown-toggle" >
                <i class="fas fa-book"></i></i> Bài viết</a>
              <ul class="nav-dropdown-items">
                 <li class="nav-item">
                  <a class="nav-link" href="{{url('/')}}/vietbai">
                    <i class="fas fa-folder-plus"></i></i> Thêm bài viết</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('/')}}/list_news">
                    <i class="fas fa-edit"></i> Chỉnh sửa bài viết</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="">
                    <i class="fas fa-exclamation-circle"></i> Báo lỗi</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="">
                    <i class="fas fa-exclamation-triangle"></i> Báo vi phạm</a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="cursor: pointer;" onclick="listCategory()">
                <i class="fas fa-chart-line"></i> Chỉnh sửa thể loại</a>
            </li>
            <li class="nav-item nav-dropdown">
              <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="fas fa-play-circle"></i> Videos</a>
              <ul class="nav-dropdown-items">
                <li class="nav-item">
                  <a class="nav-link" href="{{url('/')}}/insertVideos">
                    <i class="fab fa-accusoft"></i> Thêm videos </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('/')}}/listVideos">
                    <i class="fas fa-step-forward"></i> Danh sách videos</a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/')}}/contactView">
                <i class="fas fa-phone-alt"></i> Thay đổi liên hệ
                <span class="badge badge-danger">NEW</span>
              </a>
            </li>
            <li class="divider"></li>
          </ul>
        </nav>
      </div>
      <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">
            <a href="#">Admin</a>
          </li>
          <li class="breadcrumb-item active">Dashboard</li>
          <!-- Breadcrumb Menu-->
        </ol>
        <div class="content-fluid" id="listCategory">
  @yield('content')
        </div>
      </main>
      </aside>
    </div>
    <footer class="app-footer">
      <div>
        <a href="{{url('/')}}">Bình  Trần</a>
        <span>&copy; 2018 creativeLabs.</span>
      </div>
      <div class="ml-auto">
        <span>Powered by</span>
        <a href="{{url('/')}}">Bình Trần</a>
      </div>
    </footer>
    <!-- CoreUI and necessary plugins-->
    <script src="{{url('/')}}/css/js/bootstrap.min.js"></script> 

    <!-- lisCAtegory danh sách thể loại -->
    
    <script src="{{url('/')}}/js/admin/listCategory.js"></script>
    <script src="{{url('/')}}/js/admin/jquery.min.js"></script>
    <!-- <script src="{{url('/')}}/js/admin/popper.min.js"></script> -->
    <script src="{{url('/')}}/js/admin/bootstrap.min.js"></script>
    <script src="{{url('/')}}/js/admin/pace.min.js"></script>
    <script src="{{url('/')}}/js/admin/perfect-scrollbar.min.js"></script>
    <script src="{{url('/')}}/js/admin/coreui.min.js"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="{{url('/')}}/js/admin/main.js"></script>
  </body>
</html>
