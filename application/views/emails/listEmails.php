<div class="well">
	<div class="page-header">
		<h2>Emails</h2>
		<a class="btn btn-success" href="<?= site_url('emails/add');?>"><span class="glyphicon glyphicon-plus"></span>Novo Email</a>
	</div>
	<?= $this->session->flashdata('alert') ?>
	<table class="table table-responsive table-hover style-table">
		<thead>
			<tr>
				<th width="15%">Assunto</th>
				<th width="60%">Email</th>
				<th width="10%">Data</th>
				<th width="15%">Ações</th>
			</tr>
		</thead>
		<tbody>
		<?php
			if(count($emails)>=1){
			foreach($emails as $email){
		?>
			<tr>
				<td class="style-td"><?= $email['subject_email']; ?></td>
				<td class="style-td"><?= $email['body_email']; ?></td>
				<td><?= $email['date_email']; ?></td>
				<td>
					<div class="btn-group">
						<a class="btn btn-info btn-sm" href="<?= site_url('emails/detail')."/".$email['id_email'];?>"><span class="glyphicon glyphicon-eye-open"></span></a>
						<a class="btn btn-primary btn-sm" href="<?= site_url('emails/edit')."/".$email['id_email'];?>"><span class="glyphicon glyphicon-edit"></span></a>
						<a data-model="<?=$email['id_email']?>" data-toggle="modal" data-target="#delete_modal" type="button" class="btn btn-danger btn-sm" ><span class="glyphicon glyphicon-trash"></span></a>
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
				<p>Tem certeza que deseja apagar este Email?</p>
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
			window.location.href = "emails/delete/"+ id;
		})
	})();
</script>