function ckeditor(name) {
	var editor = CKEDITOR.replace(name, {
		uiColor: '#9AB8F3',
		language: 'vi',
		filebrowserImageBrowseUrl: baseURL_editor + '/ckfinder/ckfinder.html?Type=Images',
		filebrowserFlashBrowseUrl: baseURL_editor + '/ckfinder/ckfinder.html?Type=Flash',
		filebrowserImageUploadUrl: baseURL_editor + '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl: baseURL_editor + '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
		toolbar: [
			['Source', '-', 'Save', 'NewPage', 'Preview', '-', 'Templates'],
			['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Print'],
			['Undo', 'Redo', '-', 'Find', 'Replace', '-', 'SelectAll', 'RemoveFormat'],
			['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'HiddenField'],
			['Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript'],
			['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote', 'CreateDiv'],
			['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
			['Link', 'Unlink', 'Anchor'],
			['Image', 'Youtube', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak'],
			['Styles', 'Format', 'Font', 'FontSize'],
			['TextColor', 'BGColor'],
			['Maximize', 'ShowBlocks', '-', 'About']
		],
	}).editorConfig = function (config) {
		config.extraPlugins = 'youtube';
		config.toolbar = [{name: 'insert', items: ['Image', 'Youtube']}];
		config.youtube_width = '640';
		config.youtube_height = '480';
		config.youtube_responsive = true;
	};
}