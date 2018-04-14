$(document).ready(function(){
	
	$('.delete-category-btn').click(function(){
		$('#confirmDelete').attr('href', location.href + '/delete/' + this.id)
	})

	$("#photo_category").change(function(){
		if (this.files && this.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#category_image').attr('src', e.target.result);
			}

			reader.readAsDataURL(this.files[0]);
		}
	});

})