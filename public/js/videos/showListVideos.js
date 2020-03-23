/*showlist Videos*/
function showlistVideos() {
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({

      url : adminUrl_layout + '/showlistVideos',

      type : 'post',

      cache : false,

      data : { },

      success : function(data){
              var hm = "";
              var listVideos = JSON.parse(data);
          $.each(listVideos, function(index, value) {
            hm += '<tr role="row" class="odd">';
            hm += '<td class="sorting_1">'+ (index+1) +'</td>';
            hm += '<td class="sorting_1">' + value.name +'</td>';
            hm += '<td class="sorting_1">' + value.category +'</td>';
            hm += '<td class="sorting_1">' + value.image +'</td>';
            hm += '<td>';
            hm += '<a title="Sửa bài viết" href="'+adminUrl_layout+'/editVideos/'  + value.id +'"><i style="float: left;" class="fas fa-pen-square"></i></a>'
            +'<a"  title="Xóa bài viết" onclick="deleteVideos('+ value.id +')"  ><i style="margin-left: 10px; color: red; cursor: pointer; float: left;" class="fas fa-trash-alt"></i></a>';
            hm += '</td>';
            hm += '</tr>';
          });
          $('#videosTable').append(hm);
          $('#ajxDataTable').html('');
      },
    });
  }
$(document).ready(function(){
  showlistVideos();
});

function deleteVideos(id) {
  Swal.fire({
    title: 'Bạn có muốn xóa Videos này?',
    text: "Bài viết sẽ bị xóa vĩnh viễn!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Delete!'
    }).then((result) => {
        if (result.value) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({ 
                url : adminUrl_layout + '/deleteVideos',

                type : 'post',

                cache : false,

                data : {  id : id},
                success : function(data){
                            Swal.fire({
                            icon: 'success',
                            title: ' Xóa Videos thành công',
                            showConfirmButton: false,
                            timer: 1500,
                          })
                          location.reload(true);           
                },
                error: function() {
                   Swal.fire({
                        icon: 'error',
                        title: 'Wow!',
                        text: 'Đã sảy ra lỗi vui lòng tải lại trang và thử lại!',
                    })
                }
            });
        }
        })
}