function previewFile() {
	var preview = document.querySelector('#preview');
	var file    = document.querySelector('#cover').files[0];
	var reader  = new FileReader();

	reader.addEventListener("load", function () {
		preview.src = reader.result;
	}, false);

	if (file) {
		reader.readAsDataURL(file);
	}
}