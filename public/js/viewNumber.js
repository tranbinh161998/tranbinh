$(document).ready(function(){
    setTimeout(function(){
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({ 
        url : adminUrl_layout + '/viewNumber',

        type : 'post',

        cache : false,

        data : { stt: true, id: $('#id').val() },
        success : function(data){

        }
        });
    },5000);
});