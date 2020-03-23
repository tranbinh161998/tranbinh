function login() {
    var userName = $('#userNameLogin').val();
    var password = $('#passwordLogin').val();
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
    $.ajax({

        url: adminUrl_layout + '/loginAction',

        type: 'post' ,

        cache: false,

        data:{ userName: userName, password: password },

        success : function(data){
            if ( data == "false") {
                $('#loginError').fadeIn();
            }else{
                location.replace(adminUrl_layout + '/admin')
            }
        },
    });
}


$('input[type=password]').on('keydown', function(e) {
    if (e.which == 13) {
        login();
    }
});