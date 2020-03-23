function postComment() {
    var contentb = $('#comment').val();
    var id = $('#id').val();
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
    $.ajax({
        url : adminUrl_layout + '/postComment',

        type : 'post',

        cache : false,

        data : { contentb: contentb ,id: id},

        success : function(data){
            commentShow(0 , 5 , 1);
            $('#comment').val("");
        },
    });
}