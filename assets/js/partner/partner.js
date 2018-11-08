$(document).ready(function(){
	
	$('.delete-partner-btn').click(function(){
		var url = location.href.toString().split('?');

		var host = url[0];
		var get = "?" + url[1];
		
		$('#confirmDelete').attr('href', host + '/delete/' + this.id + get);
	})

	$("#photo_partner").change(function(){
		if (this.files && this.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#partner_image').attr('src', e.target.result);
			}

			reader.readAsDataURL(this.files[0]);
		}
	});

})