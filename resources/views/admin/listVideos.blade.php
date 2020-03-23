@extends('partial.layOutAdmin')         

@section('content')
<script src="{{url('/')}}/js/videos/showListVideos.js"></script>
<script src="{{url('/')}}/ckfinder/ckfinder.js"></script>
<script src="{{url('/')}}/func_ckfinder.js"></script>
<div class="fade-in">
    <div class="card">
        <div class="card-header"> Videos</div>
        <div class="card-body">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="col-sm-12 col-md-12"></div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-striped table-bordered datatable dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc col-md-2" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column descending" style="width: 50px;">STT</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" style="width: 250px;">Tên videos</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 82px;">Thể loại</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 130px;">Hình ảnh</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 100px;">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody id="videosTable"> 
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection