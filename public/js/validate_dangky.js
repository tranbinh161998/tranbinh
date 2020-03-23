$(document).ready(function(){    
    $('#userName').change(function(){
        var isUserName = $(this).val().trim();
        if (isUserName.length <= 6 ) {
            $('.userNameError').fadeIn();
            return false;
        }else{
            $('.userNameError').fadeOut();
        }
    })

    $('#lastName').change(function(){
        var isLastName = $(this).val().trim();
        if (isLastName.length < 2 ) {
            $('.lastNameError').fadeIn();
            return false;
        }else{
            $('.lastNameError').fadeOut();
        }
    })

    $('#firstName').change(function(){
        var isFirstName = $(this).val().trim();
        if (isFirstName.length < 2 ) {
            $('.firstNameError').fadeIn();
            return false;
        }else{
            $('.firstNameError').fadeOut();
        }
    })

    $('#password').change(function(){
        var isPassword = $(this).val().trim();
        if (isPassword.length < 6 ) {
            $('.passwordError').fadeIn();
            return false;
        }else{
            $('.passwordError').fadeOut();
        }
    })

    $('#re_password').change(function(){
        var isPassword = $('#password').val().trim();
        var isRe_password = $(this).val().trim();
        if (isRe_password != isPassword ) {
            $('.Re_password_error').fadeIn();
            return false;
        }else{
            $('.Re_password_error').fadeOut();
        }
    })
});

function validateSubmit() {
    var userName = $('#userName').val();
    var firstName = $('#firstName').val();
    var lastName = $('#lastName').val();
    var password = $('#password').val();
    var re_password = $('#re_password').val();

    if (userName.length <= 6 ) {
        $('.userNameError').fadeIn();
        return false;
    }else{
        $('.userNameError').fadeOut();
    }

    if (lastName.length < 2 ) {
        $('.lastNameError').fadeIn();
        return false;
    }else{
        $('.lastNameError').fadeOut();
    }

    if (firstName.length < 2 ) {
        $('.firstNameError').fadeIn();
        return false;
    }else{
        $('.firstNameError').fadeOut();
    }

    if (password.length < 6 ) {
        $('.passwordError').fadeIn();
        return false;
    }else{
        $('.passwordError').fadeOut();
    }

    if (re_password != password ) {
        $('.Re_password_error').fadeIn();
        return false;
    }else{
        $('.Re_password_error').fadeOut();
    
    }

    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
    $.ajax({
        url: adminUrl_layout + '/signAction',
        type: 'post' , 
        cache: false,
        data: {userName: userName , password: password , firstName: firstName, lastName: lastName},

        success: function(data){
            if (data == "true") {
                location.replace(adminUrl_layout+'/login')
            }
            if (data == "false") {
                $('.accountError').fadeIn();
            }

        },
    });
}
$('input[type=password]').on('keydown', function(e) {
    if (e.which == 13) {
        validateSubmit();
    }
});



