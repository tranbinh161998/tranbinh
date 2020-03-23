@extends('partial.layOutAdmin')

@section('content')
    <div class="container">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="{{url('/')}}/css/css/bootstrap-tagsinput.css">
        <link rel="stylesheet" type="text/css" href="{{url('/')}}/css/css/buttonToggle.css">
        <script type="text/javascript" src="{{url('/')}}/js/validateInsert.js"></script>
        <script src="{{url('/')}}/ckeditor/ckeditor.js"></script>
        <script src="{{url('/')}}/ckfinder/ckfinder.js"></script>
        <script src="{{url('/')}}/js/form_insert.js"></script>
        <script type="text/javascript">
            var $ = jQuery;
            var baseURL_editor = urlSite = "{!! url('/') !!}";
            var adminUrl = "{!! url('/') !!}/admin";
            var urlStorage = "{!! url('/') !!}/storage/";
        </script>
        <script src="{{url('/')}}/func_ckfinder.js"></script>
        <form method='post' action="{{url('/')}}/post_edit/{{$edit_news->id}}" >
            {!! csrf_field() !!}
            <h3>Tiêu đề</h3>
            <input value="{{$edit_news->tieu_de}}" type="text" name="tieu_de" style="margin-left: 5%; padding: 3px; border-radius: 3px;" placeholder="Nhập tiêu đề">
            <h3>Ảnh đại diện</h3>
            <!-- <input type="file" name="image"> -->
            <div class="form-group">
                <!-- <label>Ảnh đại diện</label> -->
                <button  type="button" class="btn btn-info buttonContent" onclick="BrowseServer();"><i class="fa fa-plus-square"> Chọn ảnh đại diện</i></button>

                <div  class="form-group" id="imageDes">
                          <span class="btn desImage">
                            <img class="img_prod" src="{{$edit_news->image}}" style="width: 120px; height: 120px;">
                            <input type="hidden" name="image" value="{{$edit_news->image}}">
                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteDesImage($(this))">  <i class="fas fa-trash-alt" style="font-size: 20px;"></i>
                            </button>
                          </span>
                </div>
            </div>
                <h3>Thể loại</h3>
                    @foreach($category as $key => $value)
                        @if ( in_array($value->id, $cate ) )
                            <input name="the_loai[]" value="{{$value->id}}" type="checkbox" checked="checked" style="margin-left: 5%">{{$value->name}}<br>
                        @else
                            <input name="the_loai[]" value="{{$value->id}}" type="checkbox" style="margin-left: 5%">{{$value->name}}<br>
                        @endif
                    @endforeach
            <h3>Nội dung tóm tắt</h3>
            <input type="text"  name="noi_dung_tom_tat" style="margin-left: 5%; padding: 3px; border-radius: 3px;" placeholder="Nhập nội dung tóm tắt" value="{{$edit_news->noi_dung_tom_tat}}">
            <h3>Nội dung</h3>
            <textarea name="noi_dung_tin" id="content">{{$edit_news->noi_dung_tin}}</textarea><br>
            <script>
                jQuery(function($) {
                        ckeditor('noi_dung_tin');
                    })
            </script>
            <h3>Thẻ TAG </h3>
            <input  id="idNews" type="text" name="" value="{{$edit_news->id}}" style="display: none;">
            <input  class="tag-B" data-role="tagsinput" type="" name="tagsInput" value="{{$tagsName}}">
            <h3>Trạng thái hiển thị</h3>
            <label class="switch">
                @if ($edit_news->viewStatus == 'No')
                    <input  class="switch-input" type="checkbox" name="viewStatus" />
                @else
                    <input value="viewStatus"  class="switch-input" type="checkbox" checked="checked" value="Yes" />
                @endif
                <span class="switch-label" data-on="Yes" data-off="No" style="width: 99px;"></span> 
                <span class="switch-handle"></span> 
            </label>
       </div>
            <button type="submit" class="btn btn-outline-success" style="margin-top: 3%; width: 100%; font-size: 30px;" ><b> Làm mới </b></button>
        </form>
    </div>

    <script src="{{url('/')}}/js/bootstrap-tagsinput.js"></script>
    

@endsection