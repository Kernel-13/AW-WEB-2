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


function validar(val){
	var text = val;
	var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; 
	var result = pattern.test(text);

	if (result) {
		$('#ok_icon').attr('class', 'icon_shown_ok');
		$('#er_icon').attr('class', 'icon_hidden');
		$('#email').css('box-shadow', '0 0 10px green');
	} else {
		$('#ok_icon').attr('class', 'icon_hidden');
		$('#er_icon').attr('class', 'icon_shown_err');
		$('#email').css('box-shadow', '0 0 10px red');
	}
}