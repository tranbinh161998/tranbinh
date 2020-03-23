@extends('partial.layOutAdmin')

@section('content')
<script src="{{url('/')}}/js/videos/insertVideos.js"></script>
<script type="text/javascript" src="{{url('/')}}/js/toasttr/js/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{url('/')}}/js/toasttr/css/toastr.min.css">
    <div class="modal" tabindex="-1" role="dialog" id="modalProgress">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Loading ...</h5>
          </div>
          <div class="modal-body">

            <div class="progress">
              <div class="progress-bar progress-bar-info progress-bar-striped active" id="progressbarContent" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:10%">
                50% Complete (info)
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
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
                                <input class="form-control" id="nameVideos" name="nameVideos" type="text" placeholder="Nhập tên Videos">
                                <label for="name">Tên khác</label>
                                <input class="form-control" id="otherNamer" name="ortherName" type="text" placeholder="Nhập tên khác">
                                <label for="name">Link Videos</label>
                                <input class="form-control" id="linkVideos" name="linkVideos" type="text" placeholder="Nhập link videos">
                                <label for="name">Thể loại videos</label>
                                <input class="form-control" id="categoryVideos" name="categoryVideos" type="text" placeholder="Nhập thể loại videos">
                                <label for="name">Avatar Videos</label><br>
                                <input  name="file" id="file" name="file" type="file" style="margin-top:1em;" ><br>
                                <input type="submit" style="margin-top:1em;" name="upload" onclick="submitFormProduct(0)" value="Đăng videos" class="btn btn-success" />
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