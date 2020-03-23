@extends('partial.layOutAdmin')

@section('content')
 <!-- css của bình -->
        <link type="text/css" rel="stylesheet" href="{{url('/')}}/css/css/animation.css"/>
         <!-- <link type="text/css" rel="stylesheet" href="{{url('/')}}/css/css/bootstrap.min.css"/> -->
        <script src="{{url('/')}}/js/list_news.js"></script>
        <input onchange ="listNews(1)" type="text" name="input_search" id="myInput" placeholder="Tìm kiếm bài viết" style="margin-left:3%; margin-top: 3%; border-radius: 12px; padding: 3px; outline: none; ">
        <p style="float: right;  margin-top: 3%;">/{{$total_news}}</p>
        <p style="float: right; margin-top: 3%;" id="number_news_search"></p>
        <input type="text" id="idnow" name="idnow" value="{{Auth::guard('admin_news2')->user()->id}}" style="display: none;">
        <select id="itemshow" onchange="listNews(1)" >
          <option value="5" selected="selected"> 5</option>
          <option value="10">10</option>
          <option value="20">20</option>
          <option value="30">30</option>
          <option value="50">50</option>
          <option value="100">100</option>
        </select>
    <div class="row" style="margin-top: 1em;">
      <div >
      <div class="container-fluid">
        <table class="table table-striped table-bordered datatable dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important; padding: 15px;">
          <thead >
            <tr role="row"  style="max-height: 30px; text-align: center;">
              <th style="width: 5.3%;">Id</th>
              <th style="width: 16.5%;">Tiêu đề</th>
              <th style="width: 16.5%;">Ảnh đại diện</th>
              <th style="width: 35%;">Nội dung tóm tắt</th>
              <th style="width: 15.5%;">Thẻ Tag</th>
              <th style="width: 8.3%;">Thao tác</th>
            </tr>
          </thead>
          <tbody id="ajxDataTable"  >
          </tbody>
        </table>
      </div>
    </div>
    </div>
    <div>
      <nav aria-label="Page navigation example">
        <ul id='number_list_news' class="pagination " style=" cursor: pointer; " ></ul>
      </nav>
    </div>

@endsection