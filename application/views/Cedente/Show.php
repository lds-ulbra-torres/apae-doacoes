<?php
/**
 * Created by PhpStorm.
 * User: LeoSorgetz
 * Date: 01/11/2016
 * Time: 01:11
 */
?>
<br>
<br>
<div class="well">
	<table class="table table-responsive">
		<tr>
			<th class="col-md-3">Razão Social:</th>
			<td><?= $cedente[0]['razao_social'] ?></td>
		</tr>
		<tr>
			<th class="col-md-3">Codigo do Cedente:</th>
			<td><?= $cedente[0]['cod_cedente'] ?></td>
		</tr>
		<tr>
			<th class="col-md-3">Numero da Agencia:</th>
			<td><?= $cedente[0]['num_agencia'] ?></td>
		</tr>
		<tr>
			<th class="col-md-3">Numero da Operacao:</th>
			<td><?= $cedente[0]['num_operacao'] ?></td>
		</tr>
		<tr>
			<th class="col-md-3">Numero da Conta Corrente:</th>
			<td><?= $cedente[0]['num_conta_corrente'] ?></td>
		</tr>
		<tr>
			<th class="col-md-3">CNPJ:</th>
			<td><?= $cedente[0]['cnpj'] ?></td>
		</tr>
		<tr>
			<th class="col-md-3">Cidade:</th>
			<td><?= $cedente[0]['name_city'] ?></td>
		</tr>
	</table>
	<a class="btn btn-default" href="<?= site_url('');?>">Voltar</a>
</div>
