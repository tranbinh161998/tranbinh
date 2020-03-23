function submitFormProduct(check) {
    event.preventDefault();
    if(validateInsertVideos(check) != false){
    var filename = $('#file').val().trim();
    var extensionfile = filename.split(".");
    var totalArray = extensionfile.length;
    var exten = extensionfile[totalArray-1];
    if ( exten == "gif" || exten == "jpg" || exten == "png" || exten == "jpeg"  ) {
      $("#progress").show();
      $.ajax({

        xhr: function() {
          var xhr = new window.XMLHttpRequest();
          xhr.upload.addEventListener("progress", function(evt) {
              if (evt.lengthComputable) {
                  var percentComplete = ((evt.loaded / evt.total) * 100);
                  $("#complete").width(percentComplete + '%');
                  if (percentComplete == 100) {
                    $("#complete").css("background-color","#20a8d8");
                    $("#complete").html("Đã upload " + percentComplete+'%');
                  }else{
                  $("#complete").html("Đã upload " + percentComplete+'%');
                  }
              }
          }, false);
          return xhr;
        },
          url : adminUrl_layout + '/actionInsertVideosAjax',
    
          method : 'post',
    
          contentType : false,
    
          processData: false ,
    
          cache : false,
    
          data : new FormData($('#upload_form')[0]),
    
          dataType:'JSON',
    
          beforeSend: function() {
          },
          success:function (data) {
            if (data.message == "true") {
              toastr.success('Lưu thành công!','Thông báo.' );
              $('#nameVideos').val("");
              $('#otherNamer').val("");
              $('#linkVideos').val("");
              $('#categoryVideos').val("");
              $('#file').val("");
            } else {
              toastr.error('Định dạng file không đúng!','Thông báo.' );
            }
            $("#progress").fadeOut(3000);
          },
      });
    } else {
      toastr.error('Định dạng file không đúng!','Thông báo.' );
    }
  }
}

function validateInsertVideos(check) {
  var  nameVideos = $('#nameVideos').val().trim();
  var  otherNamer = $('#otherNamer').val().trim();
  var  linkVideos = $('#linkVideos').val().trim();
  var  categoryVideos= $('#categoryVideos').val().trim();
  var  file = $('#file').val().trim();

  if (nameVideos.length < 3) {
    toastr.error('Tên videos quá ngắn','Thông báo.' );
    return false;
  }
  if (otherNamer.length < 3) {
    toastr.error('Tên videos quá ngắn','Thông báo.' );
    return false;
  }
  if (linkVideos.length < 10) {
    toastr.error('Link  videos quá ngắn','Thông báo.' );
    return false;
  }
  if (categoryVideos.length < 5) {
    toastr.error('Thể loại videos quá ngắn','Thông báo.' );
    return false;
  }

  if (file.length < 2 && check == 0) {
    toastr.error('Chưa có ảnh đại diện cho videos','Thông báo.' );
    return false;
  }
}


function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}

function updateVideos(check) {
  event.preventDefault();
    if(validateInsertVideos(check) != false){
    var filename = $('#file').val().trim();
    var extensionfile = filename.split(".");
    var totalArray = extensionfile.length;
    var exten = extensionfile[totalArray-1];
      $("#progress").show();
      $.ajax({
        xhr: function() {
          var xhr = new window.XMLHttpRequest();
          xhr.upload.addEventListener("progress", function(evt) {
              if (evt.lengthComputable) {
                  var percentComplete = ((evt.loaded / evt.total) * 100);
                  $("#complete").width(percentComplete + '%');
                  if (percentComplete == 100) {
                    $("#complete").css("background-color","#20a8d8");
                    $("#complete").html("Đã upload " + percentComplete+'%');
                  }else{
                  $("#complete").html("Đã upload " + percentComplete+'%');
                  }
              }
          }, false);
          return xhr;
        },
          url : adminUrl_layout + '/updateVideos',
    
          method : 'post',
    
          contentType : false,
    
          processData: false ,
    
          cache : false,
    
          data : new FormData($('#upload_form')[0]),
    
          dataType:'JSON',
    
          success:function (data) {
            if (data.message == "true") {
              toastr.success('Lưu thành công!','Thông báo.' );
            } else {
              toastr.error('Định dạng file không đúng!','Thông báo.' );
            }
            $("#progress").fadeOut(3000);
          },
      });
  }
}