function postReplyComment(idComment) {
    var contentb = $('#commentReply'+idComment).val();
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
    $.ajax({
        url : adminUrl_layout + '/postReplyComment',

        type : 'post',

        cache : false,

        data : { contentb: contentb ,idReply: idComment},

        success : function(data){
            commentShow(0 , 5 , 1);
            $('#comment').val("");
        },
    });
}