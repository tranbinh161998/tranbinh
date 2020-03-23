function submitFormNews() {

  var messageForm = $('#formNews');

  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    if (typeof CKEDITOR !== 'undefined') {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances['content'].updateElement();
        }
    }
    messageForm.ajaxForm({
      success:function(data){
        $('#idNews').val(data);

        toastr.success('Lưu thành công!','Thông báo.' );
      },

      error:function(e){
        toastr.error('Xảy ra lỗi, vui lòng thử lại!','Thông báo.' );
      }
    }).submit();
  
}