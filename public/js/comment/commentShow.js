
function commentShow( skip , take , times) {
    var id = $('#id').val();
    var htm = "";
    var showMore ="";
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
    $.ajax({
        url : adminUrl_layout + '/commentShow',

        type : 'post',

        cache : false,

        data : {id: id, skip: skip ,take: take },

        success : function(data){
            var comment = JSON.parse(data);
            var totalCommentParent = 0;
            var totalCommentReply = 0;
            $.each(comment, function (index, value) {
                htm += '<div style="float: left; clear: left; margin-bottom: 15px;">';
                htm += '<img class="commentImage" src="' + adminUrl_layout + '/image/avata.jpg">';
                htm += '<div class="commentContainer ">';
                htm += '<p class="commentName">'+ value.nameCreate +'</p>';
                htm += '<p  class="contentComment ">' + value.content +'</p>';
                htm += '</div>' ;
                if (value.check == 1) {   
                htm += '<p><a class="likebtn"> Thích</a><a class="replybtn" onclick="showInputCommnet('+value.idComment+')">Trả lời</a></p>';
                }
                if( value.check == 0){
                    htm += '<p><a class="likebtn"> Thích</a><a class="replybtn" data-toggle="modal" data-target="#openmodal" onclick="footerAniation()" >Trả lời</a></p>';
                }
                htm += '<p class="time" float="left" >'+ value.time + '</p>';
                htm += '<div>';
                $.each(value.commentReply, function(ind, val){
                if (ind > 4) {
                    htm += ' <div class="reply replyComment' + value.idComment +'" style=" display:none;">';
                }else{
                    htm += ' <div class="reply replyComment">';    
                }
                htm += '<img class="commentImage" src="'+ adminUrl_layout +'/image/avata.jpg">';
                htm += '<div class="commentContainer col-md-12"> ';
                htm += '<p class="commentName"> '+ val.nameCreateReply +'</p>';
                htm += '<p class="contentComment">' + val.contentReplly +'</p><br>';
                htm += '</div>';
                if (value.check == 1) {                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
                htm += '<p><a class="likebtn"> Thích</a><a class="replybtn" onclick="showInputCommnet('+value.idComment+')" >Trả lời</a></p>';
                }
                if( value.check == 0){
                    htm += '<p><a class="likebtn"> Thích</a><a class="replybtn" data-toggle="modal" data-target="#openmodal" onclick="footerAniation()" >Trả lời</a></p>';
                }
                htm += '<p class="time">'+ val.time + '</p>';
                htm += '</div>';
                totalCommentReply = val.totalReply;
            });

            if ( totalCommentReply > 5) {
            htm += '<p class="showMore reply show-more-btn" id="show'+value.idComment+'" onclick="showRepLy('+ value.idComment +')">Hiển thị thêm...</p>';
            }



            htm += '</div>';
            htm += '<div class="commentReplyInput'+value.idComment+'" style="float: left; clear: left; margin-left: 35px; padding: 7px; display:none;">';
            htm += '<img src="'+ adminUrl_layout +'/image/avtar-comment.jpg" class="commentImage">';
            htm += '<input type="text" id="commentReply'+ value.idComment +'" name="comment" class="commentInput">';
            htm += '<p type="button" class="btn btn-info postComment" onclick="postReplyComment(' + value.idComment +')">Bình luận</p>';
            htm += '</div>';

            htm += '</div>' ;
             totalCommentParent = value.totalComment;
        });
            if ( times == 1) {
            $('#showComment').html('');
            }  
            $('#showComment').append(htm);
        $('#loadMore').html('');
        if (totalCommentParent > (5*times)) {
            showMore += '<p class="showMore" onclick="commentShow('+ (skip+5)+ ',' + 5 +','+ (times+1) +')">Hiển thị thêm...</p>';
            $('#loadMore').append(showMore);
        }
            // $('#commentShow').html("");
            // $('#commentShow').append(htm);
        },
    });
}



function showRepLy(idComment){
     $('.replyComment'+idComment).slice().show();
     $('#show'+idComment).hide();
}

function showInputCommnet(id) {
    $('.commentReplyInput'+id).show();
}


$(document).ready(function(){
    commentShow( 0 , 5 , 1);
});