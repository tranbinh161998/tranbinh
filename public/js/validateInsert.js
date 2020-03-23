function validate_title(title){
    return title.length >= 6 ;
}
function validate_title2(title2){
    return title2.length <= 50 ;
}
function validate_noiDungTomTat(noiDungTomTat){
    return noiDungTomTat.length >= 6;
}
function validate_category(category){
    return category.length > 0;
}

function validate_tags(tags){
    return tags.length > 1;
}





$(document).ready(function(){
    $('#title').change(function(){
        var istitle = $(this).val().trim();
        if (!validate_title(istitle)) {
            toastr.error('Tiêu đề quá ngắn, vui lòng thêm tiêu đề!','Thông báo.' );
            return false;
        }
    });
    $('#noiDungTomTat').change(function(){
        var isnoiDungTomTat = $(this).val().trim();
        if (!validate_password(isnoiDungTomTat)) {
            toastr.error('Tóm tắt quá ngắn, vui lòng thêm tóm tắt!','Thông báo.' );
            return false;
        }
    });
    $('#tags').change(function(){
        var istags = $(this).val().trim();
        if (!validate(istags)) {
            toastr.error('Thẻ tags quá ngắn , vui lòng thêm thẻ tags!','Thông báo.' );
            return false;
        }
    });



    $( "#insertNews" ).submit(function(event) {
        var istitle = $('#title').val().trim();
        var isnoiDungTomTat = $('#noiDungTomTat').val().trim();
        var iscontent = $('#content').val().trim();
        var istags = $('#tags').val().trim();
        var isCheck = $("input[name='the_loai[]']").serializeArray();
        if (!validate_title(istitle)) {
            toastr.error('Tiêu đề : Quá ngắn, vui lòng thêm tiêu đề!','Thông báo.' );
            event.preventDefault();
            return;
        }
        if (!validate_title2(istitle)) {
            toastr.error('Tiêu đề : Quá dài!','Thông báo.' );
            event.preventDefault();
            return;
        }
        if (!validate_category(isCheck)) {
            toastr.error('Thể loại : Chưa chọn!','Thông báo.' );
            event.preventDefault();
            return;
        }
        if (!validate_noiDungTomTat(isnoiDungTomTat)) {
            toastr.error('Tóm tắt : Quá ngắn!','Thông báo.' );
            event.preventDefault();
            return ;
        }
        if (!validate_tags(istags)) {
            toastr.error('Thẻ tags : vui lòng thêm thẻ tags!','Thông báo.' );
            event.preventDefault();
            return;
        }
    
    });
});

// function getAlias(str){
//     str = str.valueOf().toLowerCase();
//     str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
//     str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
//     str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
//     str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
//     str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
//     str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
//     str = str.replace(/đ/g, "d");
//     str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g, "-");
//     str = str.replace(/-+-/g, "-");
//     str = str.replace(/^\-+|\-+$/g, "");
//     str = str.replace(/–/g, "");
//     return str;
// }

// function changeTitle(str, id) {
//   var alias = getAlias(str);
//   $(id).val(alias);
// }

