function BrowseServer() {
  var finder = new CKFinder();
  finder.selectActionFunction = SetFileField;
  finder.popup();
}

function SetFileField(fileUrl) {
    var htm = '';

    htm += '<span class="btn desImage">';
    htm += '<img class="img_prod" src="' + fileUrl + '" style="width: 120px; height: 120px;">';
    htm += '<input type="hidden" name="image" value="' + fileUrl + '">';
    htm += '<button type="button" class="btn btn-danger btn-sm" onclick="deleteDesImage($(this))"><i class="fas fa-trash-alt"></i></button>';
    htm += '</span>';

    $('#imageDes').html(htm);
}



function deleteDesImage(remove) {
  remove.closest('span.desImage').remove();
}