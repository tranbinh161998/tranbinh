@extends('partial.layOutAdmin')

@section('content')
<script src="{{url('/')}}/js/videos/insertVideos.js"></script>
<script type="text/javascript" src="{{url('/')}}/js/toasttr/js/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{url('/')}}/js/toasttr/css/toastr.min.css">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header"><strong>Thêm Videos mới</strong></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <form method="post" id="upload_form"  enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                <label for="name">Tên Videos</label>
                                <input class="form-control" id="nameVideos" value="{{$videos->name}}" name="nameVideos" type="text" placeholder="Nhập tên Videos">
                                <label for="name">Tên khác</label>
                                <input class="form-control" id="otherNamer" value="{{$videos->ortherName}}" name="ortherName" type="text" placeholder="Nhập tên khác">
                                <label for="name">Link Videos</label>
                                <input class="form-control" id="linkVideos" value="{{$videos->link}}" name="linkVideos" type="text" placeholder="Nhập link videos">
                                <label for="name">Thể loại videos</label>
                                <input class="form-control" id="categoryVideos" value="{{$videos->category}}" name="categoryVideos" type="text" placeholder="Nhập thể loại videos">
                                <label for="name">Avatar Videos</label><br>
                                <input  name="file" id="file" name="file" onchange="preview_image(event)" type="file" style="margin-top:1em;" ><br>
                                <img style="width:100px;height:100px; overflow:hidden;" id="output_image" src="{{url('/')}}/{{$videos->image}}" /><br>
                                <input id="idVideos" value="{{$videos->id}}" name="idVideos" style="display:none;" />
                                <input type="submit" style="margin-top:1em;" name="upload" onclick="updateVideos({{$videos->id}})" value="Đăng videos" class="btn btn-success" />
                                <div style="display:none; margin-top : 1em;" id="progress" class="progress">
                                    <div style="background-color:tomato;" id="complete" class="progress-bar progress-bar-success" role="progress-bar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection