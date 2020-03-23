
function listNews(pagenow) {
    var itemshow = Number($('#itemshow').val())
    var sk = itemshow * pagenow - itemshow;
    var ta = itemshow;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({

        url : adminUrl_layout + '/postSearchNews',

        type : 'post',

        cache : false,

        data : { search: $('#myInput').val() , sk: sk , ta: ta },

     success : function(data){
        var list = JSON.parse(data);
        var htm = '';
        var idnow = $('#idnow').val();
        var idnow1 = Number(idnow);
        var input = $('#myInput').val();
        var lastId = 0;
        if( input != null || input != ''){
            $.each(list.data, function (index, value) {
                var id_creator_now = Number(value.id_creator);
                if (idnow1 == id_creator_now) {
                    htm += '<tr>';
                    htm += '<td>' + value.id +'</td>';
                    htm += '<td>' + value.tieu_de +'</td>';
                    htm += '<td>'+ '<img style="width:70px; height:70px;" src="'+adminUrl_layout + value.image +'"></td>';
                    htm += '<td>' + value.noi_dung_tom_tat +'</td>';
                    htm += '<td>' + value.tagdata + '</td>';
                    htm += '<td>';
                    htm += '<a title="Sửa bài viết" href="'+ adminUrl_layout + '/get_edit/'+ value.slug +'-'+ value.id+'.html"><i style="float: left;" class="fas fa-pen-square"></i></a>'
                    +'<a onclick="deleteNews(' + value.id+ ')"  title="Xóa bài viết" ' + value.id +
                     ' "  ><i style="margin-left: 10px; color: red; cursor: pointer; float: left;" class="fas fa-trash-alt"></i></a>'+'';
                    htm += '</td>';
                    htm += '</tr>';
                    $('#ajxDataTable').html('');
                    $('#ajxDataTable').append(htm);
                }

            });
        }
            // tính số trang cần có
    if(pagenow == 0|| pagenow == null || pagenow == ''){
        pagenow = 1;
    }
        var total_news = list.total_news;
        var hm = '';
        var i = 1;
        // số trang cần thiết
        var numberpage = Math.ceil(total_news / itemshow) + 1 ;
        // hiển thị sô trang cần thiết
        // Cài đặt cho nút back
        if ((Math.ceil(total_news / itemshow) + 1) > 2) {
            if( pagenow < numberpage){
                hm += '<li style="padding:5px 8px; border-top-left-radius: 7px; border-bottom-left-radius: 7px; " class=" btn-light page-item">';
                hm+='<a onclick="listNews('+(pagenow-1)+')">'+'Back'+'</a>'
                hm+= '</li>';
            }else{
                hm += '<li style="padding:5px 8px; border-top-left-radius: 7px; border-bottom-left-radius: 7px;" class=" btn-light page-item">';
                hm+='<a onclick="listNews('+(pagenow )+')">'+'Back'+'</a>'
                hm+= '</li>';
            }
        }
        for(i == 1 ; i < numberpage ; i == numberpage){
            if( i == pagenow ){
                hm += '<li style="padding:5px 8px;" class=" btn-light page-item active">';
            }else{
            hm += '<li style="padding:5px 8px;"  class="btn-light  page-item">';
            }
            hm+='<a onclick="listNews('+i+')">'+i+'</a>'
            hm+= '</li>';
            i = i+1;
        }
        // cài đặt cho nút next
        // if (pagenow == numberpage) {
        //         hm += '<li style="padding:5px 8px;"  class="btn-light  page-item">';
        //         hm+='<a>'+'Next'+'</a>'
        //         hm+= '</li>';
        //         $('#number_list_news').html('');
        //         $('#number_list_news').append(hm);
        // }
        if ((Math.ceil(total_news / itemshow) + 1) > 2) {
            if( pagenow < numberpage - 1){
                hm += '<li style="padding:5px 8px; border-top-right-radius: 7px; border-bottom-right-radius: 7px;"  class="btn-light page-item">';
                hm+='<a onclick="listNews('+(pagenow+1)+')">'+'Next'+'</a>'
                hm+= '</li>';
            }
            if (numberpage -1 == pagenow) {
                hm += '<li style="padding:5px 8px; border-top-right-radius: 7px; border-bottom-right-radius: 7px;"  class="btn-light page-item">';
                hm+='<a onclick="listNews('+(numberpage - 1)+')" >'+'Next'+'</a>'
                hm+= '</li>';
            }
        }
             $('#number_list_news').html('');
             $('#number_list_news').append(hm);
        $('#number_news_search').html('');

        $('#number_news_search').append('Bài viết tìm thấy : ' + list.totalNewsNow);
     },
            
    });

}



function deleteNews(id) {
    Swal.fire({
        title: 'Bạn có muốn xóa bài viết này?',
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
                    url : adminUrl_layout + '/deleteNews',

                    type : 'post',

                    cache : false,

                    data : {  id : id},
                    success : function(data){
                                Swal.fire({
                                icon: 'success',
                                  title: ' Xóa bài viết thành công',
                                  showConfirmButton: false,
                                  timer: 1500
                                })
                        listNews(1);           
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
$(document).ready(function(){
    listNews(1);
});