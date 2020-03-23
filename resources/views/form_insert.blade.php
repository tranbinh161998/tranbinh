@extends('partial.layOutAdmin')

@section('content')
    <div class="container">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="{{url('/')}}/ckeditor/ckeditor.js"></script>
        <script src="{{url('/')}}/ckfinder/ckfinder.js"></script>
        <script src="{{url('/')}}/js/form_insert.js"></script>
        <script type="text/javascript" src="{{url('/')}}/js/validateInsert.js"></script>
        <script type="text/javascript" src="{{url('/')}}/js/toasttr/js/toastr.min.js"></script>
        <link rel="stylesheet" type="text/css" href="{{url('/')}}/js/toasttr/css/toastr.min.css">
        <link rel="stylesheet" type="text/css" href="{{url('/')}}/css/css/bootstrap-tagsinput.css">
        <link rel="stylesheet" type="text/css" href="{{url('/')}}/css/css/buttonToggle.css">
        <script type="text/javascript">
            var $ = jQuery;
            var baseURL_editor = urlSite = "{!! url('/') !!}";
            var adminUrl = "{!! url('/') !!}/admin";
            var urlStorage = "{!! url('/') !!}/storage/";
        </script>
        <script src="{{url('/')}}/func_ckfinder.js"></script>
        <form method='post' id="insertNews" action="{{route('acction_insert')}}" >
            <input type="number" name="viewNumber" value="0" style="display: none;">
            {!! csrf_field() !!}
            <h3>Tiêu đề</h3>
            <input type="text" name="id_creator" value="{{Auth::guard('admin_news2')->user()->id}}" style="display: none;">
            <input type="text" name="tieu_de" onkeyup="changeTitle($(this).val(), '#idSlug')" id="title" style="margin-left: 5%; padding: 3px; border-radius: 3px;" placeholder="Nhập tiêu đề">
            <h3>Ảnh đại diện</h3>
            <!-- <input type="file" name="image"> -->
            <div class="form-group">
                <!-- <label>Ảnh đại diện</label> -->
                <button type="button" class="btn btn-info buttonContent" onclick="BrowseServer();"><i class="fa fa-plus-square"> Chọn ảnh đại diện</i></button>

                <div class="form-group" id="imageDes">

                </div>
            </div>
                <h3>Thể loại</h3>
                <div id="checkbox">
                @foreach($category as $key => $value) 
                <input name="the_loai[]" value="{{$value->id}}" type="checkbox" style="margin-left: 5%">{{$value->name}}<br>
                @endforeach
                </div>
            <h3>Nội dung tóm tắt</h3>
            <input type="text" name="noi_dung_tom_tat" id="noiDungTomTat" style="margin-left: 5%; padding: 3px; border-radius: 3px;" placeholder="Nhập nội dung tóm tắt">
            <h3>Nội dung</h3>
            <textarea name="noi_dung_tin" id="content"></textarea>
            <script>
                jQuery(function($) {
                        ckeditor('noi_dung_tin');
                    })
            </script>
            <h3>Thẻ TAG </h3>
            <input id="tags" class="tag-B" data-role="tagsinput" type="" name="tagsInput">
            <h3>Trạng thái hiển thị</h3>
            <label class="switch">
                <input  class="switch-input" type="checkbox" name="viewStatus" value="No"/> 
                <span class="switch-label" data-on="Yes" data-off="No" style="width: 99px;"></span> 
                <span class="switch-handle"></span> 
            </label>
            <button type="submit" class="btn btn-outline-success" style="margin-top: 3%; width: 100%; font-size: 30px;" ><b> Đăng bài </b></button>
        </form>
    </div>
    <script src="{{url('/')}}/js/create_news.js"></script>
    <script src="{{url('/')}}/js/bootstrap-tagsinput.js"></script>

@endsection