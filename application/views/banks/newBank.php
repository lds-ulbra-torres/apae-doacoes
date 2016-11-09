	<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bancos</title>
	<link rel="stylesheet" href="<?php echo site_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
</head>
<body>
	<div class="container">
		<div class="page-header">
			<h4 style="text-align: center"> Novo Banco </h4> <br>
		</div>
		<form method="POST" action="<?= site_url('banks/create'); ?>">
			<div class="row">
				<div class="form-group col-md-offset-4 col-md-3">
					<label for="name">Nome</label>
					<input placeholder="Banco Apae" class="form-control" type="text" id="name" name="bank[name_bank]" required>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-offset-4 col-md-3">
					<label for="telephone">Telefone</label>
					<input type="text" placeholder="(00) 0000-0000" class="form-control" attrname="telephone1" id="telephone" name="bank[phone_bank]" required>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-offset-4 col-md-2">
					<label for="agency_number">Agência</label>
					<input type="text" placeholder="0000" class="form-control" onkeyup="somenteNumeros(this);" id="agency_number" name="bank[agency_number]" required>
				</div>
				<div class="form-group col-md-1">
					<label for="check_digit_agency">DV</label>
					<input type="text" placeholder="0" class="form-control" onkeyup="somenteNumeros(this);" maxlength="1" id="check_digit_agency"  name="bank[check_digit_agency]" required>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-offset-4 col-md-2">
					<label for="account_number">Conta Corrente</label>
					<input type="text" placeholder="0000" class="form-control" onkeyup="somenteNumeros(this);" id="account_number" name="bank[account_number]" required>
				</div>
				<div class="form-group col-md-1">
					<label for="check_digit_account">DV</label>
					<input type="text" class="form-control" placeholder="0" onkeyup="somenteNumeros(this);" maxlength="1" id="check_digit_account" name="bank[check_digit_account]" required>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-offset-4 col-md-2">
					<a href="<?= site_url('banks'); ?>" class="btn btn-primary"> Voltar </a>
				</div>
				<div class="form-group col-md-2">
					<button type="submit" class="btn btn-success">Criar</button>
				</div>
			</div>
		</form>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-masker/1.1.0/vanilla-masker.min.js"></script>
	<script type="text/javascript">
		function inputHandler(masks, max, event) {
			var c = event.target;
			var v = c.value.replace(/\D/g, '');
			var m = c.value.length > max ? 1 : 0;
			VMasker(c).unMask();
			VMasker(c).maskPattern(masks[m]);
			c.value = VMasker.toPattern(v, masks[m]);
		}
		var telMask = ['(99) 9999-99999', '(99) 99999-9999'];
		var tel = document.querySelector('input[attrname=telephone1]');
		VMasker(tel).maskPattern(telMask[0]);
		tel.addEventListener('input', inputHandler.bind(undefined, telMask, 14), false);
	</script>
	<script>
	    function somenteNumeros(num) {
	        var er = /[^0-9.]/;
	        er.lastIndex = 0;
	        var campo = num;
	        if (er.test(campo.value)) {
	          campo.value = "";
	        }
	    }
 	</script>
</body>
</html>
