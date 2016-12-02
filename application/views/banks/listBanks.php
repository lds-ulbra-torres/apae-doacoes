<div class="well">
	<div class="">
		<div class="page-header">
			<h2>Bancos</h2>
			<a class="btn btn-success" href="<?= site_url('banks/add');?>"><span class="glyphicon glyphicon-plus"></span> Cadastrar Banco</a>
		</div>
		<div class="row">
				<div class="form-group col-md-offset-4 col-md-4">
					<?php if($this->session->flashdata("success")): ?>
						<p class="alert alert-success alerts-hide">  <?=  $this->session->flashdata("success") ?>  </p>
					<?php endif ?>
					<?php if($this->session->flashdata("danger")): ?>
						<p class="alert alert-danger alerts-hide">  <?=  $this->session->flashdata("danger")?>  </p>
					<?php endif ?>
				</div>
			</div>
		<table class="table table-responsive table-hover">
			<thead>
				<tr>
					<th>Código</th>
					<th>Nome</th>
					<th>Telefone</th>
					<th>Agência</th>
					<th>DV</th>
					<th>Conta Corrente</th>
					<th>DV</th>
				</tr>
			</thead>
			<tbody>
			<?php
				if(count($banks)>=1){
				foreach($banks as $bank){
			?>
				<tr>
					<td><?= $bank['id_bank'];?> </td>
					<td><?= $bank['name_bank']; ?></td>
					<td><?= $bank['phone_bank']; ?></td>
					<td><?= $bank['agency_number']; ?></td>
					<td><?= $bank['check_digit_agency']; ?></td>
					<td><?= $bank['account_number']; ?></td>
					<td><?= $bank['check_digit_account']; ?></td>
					<td>
						<div class="btn-group">
							<a class="btn btn-primary" href="<?= site_url('banks/edit')."/".$bank['id_bank'];?>"><span class="glyphicon glyphicon-edit"></span></a>
							<a data-model="<?=$bank['id_bank']?>" data-toggle="modal" data-target="#delete_modal" type="button" data-model-id="<?= $bank['id_bank'] ?>" data-toggle="modal" data-target=".bs-example-modal-sm" class="btn btn-danger" ><span class="glyphicon glyphicon-trash"></span></a>
						</div>
					</td>
				</tr>
			<?php
				}
			}
			?>
			</tbody>
		</table>
	</div>
</div>

<div class="modal fade" id="delete_modal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Confirmar Exclusão</h4>
			</div>
			<div class="modal-body">
				<p>Tem certeza que deseja apagar este Banco?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</button>
				<a data-dismiss="modal" id="confirmDelete" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Apagar</a>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	(function() {
		var id, button;
		$('#delete_modal').on('show.bs.modal', function(e) {
			button = $(e.relatedTarget);
			id = button.data('model');
		})
		$('#confirmDelete').on('click', function() {
			$.ajax({
				url: 'banks/delete/'+id,
				type: 'POST',
				success: function(data) {
					$(button).closest('tr').remove();
				},
				error: function(err) {
					console.error(err);
				}
			});
		})
	})();
</script>
