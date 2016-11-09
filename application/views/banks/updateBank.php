<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Alterar Banco</title>
	<link rel="stylesheet" href="<?php echo site_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
</head>
<body>
	<div class="container">
		<div class="page-header">
			<h4 style="text-align: center">Alterar Dados </h4> <br>
		</div>
		<form method="POST" action="<?= site_url('banks/update').'/'.$bank[0]['id_bank']; ?>">
			<div class="row">
				<div class="form-group col-md-offset-4 col-md-3">
					<input type="hidden" value="<?= $bank[0]['id_bank']; ?>" name="bank[id_bank]">
					<label for="name">NOME</label>
					<input class="form-control" placeholder="Banco Apae" type="text" value="<?= $bank[0]['name_bank']; ?> " id="name" name="bank[name_bank]" required>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-offset-4 col-md-3">
					<label for="telephone">TELEFONE</label>
					<input class="form-control" placeholder="(00) 0000-0000" type="text" attrname="telephone" value="<?= $bank[0]['phone_bank']; ?> " id="telepnone" name="bank[phone_bank]" required>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-offset-4 col-md-2">
					<label for="agency_number">AGÊNCIA</label>
					<input class="form-control" placeholder="0000" onkeyup="somenteNumeros(this);" type="text" value="<?= $bank[0]['agency_number']; ?> " id="agency_number" name="bank[agency_number]" required>
				</div>
				<div class="form-group col-md-1">
					<label for="telefone">DV</label>
					<input class="form-control" placeholder="0" onkeyup="somenteNumeros(this);" type="text" maxlength="1" value="<?= $bank[0]['check_digit_agency']; ?> " id="check_digit_agency" name="bank[check_digit_agency]" required>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-offset-4 col-md-2">
					<label for="account_number">CONTA CORRENTE</label>
					<input class="form-control" placeholder="0000" onkeyup="somenteNumeros(this);" type="text" value="<?= $bank[0]['account_number']; ?> " id="account_number" name="bank[account_number]" required>
				</div>
				<div class="form-group col-md-1">
					<label for="check_digit_account">DV</label>
					<input class="form-control" placeholder="0" onkeyup="somenteNumeros(this);" maxlength="1" type="text" value="<?= $bank[0]['check_digit_account']; ?> " id="check_digit_account" name="bank[check_digit_account]" required>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-offset-4 col-md-2">
					<a href="<?= site_url('banks'); ?>" class="btn btn-primary">Voltar</a>
				</div>
				<div class="form-group col-md-2">
					<button type="submit" class="btn btn-success">Salvar</button>
				</div>
			</div>
		</form>
		<div id="destino"></div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-masker/1.1.0/vanilla-masker.min.js"></script>
	<script type="text/javascript" language="javascript">
		function inputHandler(masks, max, event) {
			var c = event.target;
			var v = c.value.replace(/\D/g, '');
			var m = c.value.length > max ? 1 : 0;
			VMasker(c).unMask();
			VMasker(c).maskPattern(masks[m]);
			c.value = VMasker.toPattern(v, masks[m]);
		}
		var telMask = ['(99) 9999-99999', '(99) 99999-9999'];
		var tel = document.querySelector('input[attrname=telephone]');
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
