function saveChangePassword(){
    var passWordOld = $('#passWordOld').val().toString();
    var passwordNew = $('#passwordNew').val().toString();
    var confirmPassword = $('#confirmPassword').val().toString();
    if (passwordNew != confirmPassword) {
        Swal.fire({
            icon: 'error',
            title: 'Wow!',
            text: 'Mật khẩu không khớp!',
            timer: 1500,
        })
        event.preventDefault();
        return;
    }
    if (passwordNew == "") {
            Swal.fire({
            icon: 'error',
            title: 'Wow!',
            text: 'Mật khẩu không được để trống!',
            timer: 1500,
        })
        event.preventDefault();
        return;
    }
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
    $.ajax({
        url : adminUrl_layout + '/saveChangePassword',

        type : 'post',

        cache : false,

        data : { passWordOld: passWordOld, passwordNew: passwordNew , confirmPassword: confirmPassword },
        success : function(data){
            if (data == "true") {
                Swal.fire({
                    icon: 'success',
                    title: ' Đổi mật khẩu thành công',
                    showConfirmButton: false,
                    timer: 1500
                })
                passWordOld = $('#passWordOld').val("");
                passwordNew = $('#passwordNew').val("");
                confirmPassword = $('#confirmPassword').val("");
            }else{
                Swal.fire({
                icon: 'error',
                title: 'Wow!',
                text: 'Mật khẩu không đúng hãy thử lại!',
                timer: 1500,
        })
            }
        },
        error: function() {

        }

    });
}