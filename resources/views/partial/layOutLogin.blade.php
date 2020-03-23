
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="keyword" content="Admin-Bình,tin tức,thực tập, demo bình">
    <title>{{$title}}</title>

    <script src="{{url('/')}}/css/js/jquery.min.js"></script>
    <link href="{{url('/')}}/css/admin/stylelogin.css" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/')}}/css/font-css/css/all.css">
    <link rel="stylesheet" href="{{url('/')}}/css/admin/loadAnimation.css">
    <script>
        var adminUrl_layout = "{!! url('/') !!}";
    </script>
</head>
<body class="c-app flex-row align-items-center" style="background-image:url('{{url('/')}}/image/background.jpg');background-size: cover;">
      <img id="loadingImage" src="{{url('/')}}/css/img/golden.svg">
      <div id="background">
      </div>
      <script >
        $(window).on("load",function(){
            $("#loadingImage").fadeOut("alow");
            $("#background").fadeOut("alow");
          });
    </script>
<div class="container">
  @yield('content')
</div>
</body>