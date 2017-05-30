<form action="<?= base_url('emails/create'); ?>" method="POST">
	<div class="form-group">
		<label for="id_contactEmail">Para:</label>
		<input type="text" name="email[to_email]">
	</div>
	<div class="form-group">
		<label for="subject">Assunto:</label>
		<input type="text" class="form-control" id="subject" name="email[subject_email]" required>
	</div>
	<textarea name="email[body_email]" class="ckeditor"></textarea>
	<br/>
	<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-send"></span> Enviar</button>
</form>
<br/>