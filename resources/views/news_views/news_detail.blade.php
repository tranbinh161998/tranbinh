@extends('partial.layout_news')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/css/css/tags.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/css/css/newsDetail.css">
    <script type="text/javascript" src="{{url('/')}}/js/comment/postComment.js"></script>
    <script type="text/javascript" src="{{url('/')}}/js/comment/postReplyComment.js"></script>
    <script type="text/javascript" src="{{url('/')}}/js/comment/commentShow.js"></script>
    <input type="text" id="id"  style="display: none;" value="{{$news->id}}">
    <div id="contentDetail" class="container" >
        <h3 style="text-align: center; margin-top: 5px;">Đề xuất cho bạn</h3>
        <div class="owl-carousel owl-theme col-md-8" style="padding-top: 10px;">
            @foreach ( $news_offer as $key => $value)
                <a href="{{url('/')}}/news_detail/{{$value->slug}}-{{$value -> id}}.html"">
                    <div class="item" style="background: #eee;">
                        <img style="max-height: 100px;" src="{{$value->image}}">
                        <p style="font-size: 17px; text-align: center;">{{$value->tieu_de}}</p>
                    </div>
                </a>
            @endforeach
        </div>
        <script src="{{url('/')}}/js/owl.js"></script>
        <script src="{{url('/')}}/js/viewNumber.js"></script>
        <div class="col-md-8">
            <h2 class="titleDetail">{{$news->tieu_de}}</h2>    
            <p style="font-size: 12px;">Ngày    :{{$news->date}}</p>       
            <p>{{$news->noi_dung_tom_tat}}</p>       
            <img src="{{$news->image}}" style="width: 500px; height: 400px;">         
            <p>{!!$news->noi_dung_tin!!}</p>   
            <h4 style="clear: left;">Bình luận</h4>
            <div id="showComment">
            </div>
            <div id="loadMore"></div>
            @if(Auth::guard('admin_news2')->check())
                <div class="insertCommet" style="clear: left;">
                    <img src="{{url('/')}}/image/avtar-comment.jpg" class="commentImage">
                    <input type="text" id="comment" name="comment" class="commentInput">
                    <p type="button" class="btn btn-info postComment" onclick="postComment()">Bình luận</p>
                    <h3>Tags : </h3>
                        @foreach ( $tagnames as $key => $value)
                        <p style="float: left; " class="tagb">{{$value}}</p>
                        @endforeach
                </div>
            @endif

        </div>
    </div>
@endsection