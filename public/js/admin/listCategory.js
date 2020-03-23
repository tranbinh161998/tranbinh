function listCategory() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({ 
        url : adminUrl_layout + '/listCategory',

        type : 'post',

        cache : false,

        data : { },
        success : function(data){
            var listCategory = JSON.parse(data);
            var hm = "";
            $('#listCategory').html('');

            hm += '<h3>Danh sách thể loại</h3>' + '<button onclick="addCategory() " style="cursor : pointer;" class="button button--winona button--border-thin button--round-s" data-text="Thêm thể loại"><span><i class="fas fa-plus-circle"></i> Thêm thể loại</span></button>';
            hm += '<div class="col-md-5">';
            hm += '<table class="table table-striped table-bordered datatable dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important; padding: 15px;">';
            hm += '<thead >';
            hm += '<tr role="row"  style="max-height: 30px; text-align: center;">';
            hm += '<th style="wight:20%;">Id</th>';
            hm += '<th style="wight:60%;">Tên thể loại</th>';
            hm += '<th style="wight:10%;">Thao tác</th>';
            hm += '</tr>';
            hm += '</thead>';
            hm += '<tbody>';
            $.each(listCategory, function (index, value) {
                hm += '<tr>';
                hm += '<td>'+ value.id +'</td>';
                hm += '<td>'+ value.name+'</td>';
                hm += '<td>';
                hm += '<a onclick ="editCategory('+ value.id +')" ><i style="float: left;cursor: pointer;" class="fas fa-pen-square"></i></a>'
                hm += '<a onclick="deleteCategory('+ value.id + ')" ><i style="margin-left: 10px; color: red; cursor: pointer; float: left;" class="fas fa-trash-alt"></i></a>'
                hm += '</td>';
                hm += '</tr>';
            });
            hm += '</tbody></table>';
            hm += '</div>'
            $('#listCategory').append(hm);
        },
        error: function() {
            Swal.fire({
              icon: 'error',
              title: 'Có lỗi vui lòng tải lại trang',
              showConfirmButton: false,
              timer: 1500
            })
         }
        });
}
function editCategory(id){
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
     $.ajax({ 
        url : adminUrl_layout + '/showCategory',

        type : 'post',

        cache : false,

        data : { id: id },
        success : function(data){
            var nameCategory = JSON.parse(data);
            (async () => {
                const inputValue = nameCategory.name
                const { value: ipAddress } = await 
                Swal.fire({
                  title: 'Chỉnh sửa tên thể loại',
                  input: 'text',
                  inputValue: inputValue,
                  showCancelButton: true,
                  inputValidator: (value) => {
                    if (!value) {
                      return 'Tên thể lọai không được để trống!'
                    }
                  }
                })
                if (ipAddress) {
                    $.ajax({ 
                        url : adminUrl_layout + '/updateCategory',

                        type : 'post',

                        cache : false,

                        data : { name: ipAddress , id : nameCategory.id},
                        success : function(data){
                            Swal.fire(`Đổi tên thành công! `)
                            listCategory();
                        },
                         error: function() {
                            Swal.fire({
                              icon: 'error',
                              title: 'Có lỗi vui lòng tải lại trang',
                              showConfirmButton: false,
                              timer: 1500
                            })
                         }

                    });
                  Swal.fire(`Đổi tên thành`+ ipAddress +` thành công! `)
                }

            })()

        },
        error: function() {
            Swal.fire({
              icon: 'error',
              title: 'Sever gặp lỗi vui lòng tải lại trang',
              showConfirmButton: false,
              timer: 1500
            })
        }
        });
}
function deleteCategory(id) {
    Swal.fire({
        title: 'Bạn có muốn xóa thể loại này ?',
        text: "Thể loại sẽ bị xóa vĩnh viễn!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete!'
        }).then((result) => {
            if (result.value) {
                $.ajaxSetup({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                });
                $.ajax({ 
                    url : adminUrl_layout + '/deleteCategory/' + id,

                    type : 'post',

                    cache : false,

                    data : {},
                    success : function(data){
                                Swal.fire({
                                icon: 'success',
                                  title: ' Xóa thể loại thành công',
                                  showConfirmButton: false,
                                  timer: 1500
                                })
                            listCategory();
                    },
                    error: function() {
                        Swal.fire({
                          icon: 'error',
                          title: 'Có lỗi vui lòng tải lại trang',
                          showConfirmButton: false,
                          timer: 1500
                        })
                     }
                });
            }
        })
}

function addCategory(){
    (async () => {
        const { value: ipAddress } = await 
        Swal.fire({
          title: 'Thêm thể loại',
          input: 'text',
          showCancelButton: true,
          inputValidator: (value) => {
            if (!value) {
              return 'Tên thể lọai không được để trống!'
            }
          }
        })
        if (ipAddress) {
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });
            $.ajax({ 
                url : adminUrl_layout + '/addCategory',

                type : 'post',

                cache : false,

                data : { name: ipAddress },
                success : function(data){
                    Swal.fire(`Thêm thể loại thành công! `)
                    listCategory();
                },
                 error: function() {
                    Swal.fire({
                      icon: 'error',
                      title: 'Có lỗi vui lòng tải lại trang',
                      showConfirmButton: false,
                      timer: 1500
                    })
                 }

            });
        }

    }) ()
}
                       