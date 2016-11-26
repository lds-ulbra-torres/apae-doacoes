<div class="well">
	<div class="page-header">
		<h2>Alterar Banco</h2>
	</div>
	<form method="POST" action="<?= site_url('banks/update').'/'.$bank[0]['id_bank']; ?>">
		<div class="form-horizontal">
			<div class="form-group">
				<input type="hidden" value="<?= $bank[0]['id_bank']; ?>" name="bank[id_bank]">
				<label for="name">Nome</label>
				<input class="form-control" placeholder="Banco Apae" type="text" value="<?= $bank[0]['name_bank']; ?> " id="name" name="bank[name_bank]" required>
			</div>

			<div class="form-group">
				<label for="telephone">Telefone</label>
				<input class="form-control" placeholder="(00) 0000-0000" type="text" attrname="telephone" value="<?= $bank[0]['phone_bank']; ?> " id="telepnone" name="bank[phone_bank]" required>
			</div>

			<div class="form-group">
				<label for="agency_number">Agência</label>
				<input class="form-control" placeholder="0000" onkeyup="somenteNumeros(this);" type="text" value="<?= $bank[0]['agency_number']; ?> " id="agency_number" name="bank[agency_number]" required>
			</div>

			<div class="form-group">
				<label for="telefone">DV</label>
				<input class="form-control" placeholder="0" onkeyup="somenteNumeros(this);" type="text" maxlength="1" value="<?= $bank[0]['check_digit_agency']; ?> " id="check_digit_agency" name="bank[check_digit_agency]" required>
			</div>

			<div class="form-group">
				<label for="account_number">Conta Corrente</label>
				<input class="form-control" placeholder="0000" onkeyup="somenteNumeros(this);" type="text" value="<?= $bank[0]['account_number']; ?> " id="account_number" name="bank[account_number]" required>
			</div>

			<div class="form-group">
				<label for="check_digit_account">DV</label>
				<input class="form-control" placeholder="0" onkeyup="somenteNumeros(this);" maxlength="1" type="text" value="<?= $bank[0]['check_digit_account']; ?> " id="check_digit_account" name="bank[check_digit_account]" required>
			</div>

			<div class="form-group">
				<a href="<?= site_url('banks'); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>
				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
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
