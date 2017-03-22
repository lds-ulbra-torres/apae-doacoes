<div class="well well-lg">
	<div class="page-header">
		<h2>Frequências</h2>
		<a class="btn btn-success" href="<?= site_url('frequency/add'); ?>" title="Cadastrar"><span class="glyphicon glyphicon-plus"></span> Cadastrar Frequência</a>

	</div>

	  <?= $this->session->flashdata('alert') ?>

	<table id="Tfrequency" class="table table-responsive table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Tipo</th>
				<th>Qtd. Parcelas</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php if ($frequencies != null) {
				foreach ($frequencies as $frequency): ?>
					<tr>
						<td><?= $frequency->id_frequency; ?></td>
						<td><?= $frequency->frequency_description; ?></td>
						<td><?= $frequency->frequency_count; ?></td>
						<td>
							<div class="btn-group">
									<a class="btn btn-primary btn-sm" title="Editar"	href="<?php echo site_url('frequency/edit') . "/" . $frequency->id_frequency ?>">
										<span class="glyphicon glyphicon-edit"></span>
									</a>
									<a data-model="<?=$frequency->id_frequency?>" data-toggle="modal" data-target="#delete_modal" title="Apagar" class="btn btn-danger btn-sm" href="#">
										<span class="glyphicon glyphicon-trash"></span>
									</a>
							</div>
						</td>
					</tr>
				<?php endforeach;
			} ?>
		</tbody>
	</table>

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
	        <p>Tem certeza que deseja apagar esta Frequência?</p>
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
	      /*$.ajax({
	        url: 'frequency/delete/'+id,
	        type: 'POST',
	        success: function(data) {
	          $(button).closest('tr').remove();
	        },
	        error: function(err) {
	          $('.toast').text("Erro de violação de integridade de dados!").fadeIn(400).delay(3000).fadeOut(400);
	        }
	      });*/
				window.location.href = "frequency/delete/"+ id;
	    })
	  })();
	</script>


	<div hidden id="sucessDelete" class="alert alert-success">
		<span class="glyphicon glyphicon-trash"></span>  Cadastro Exlcuido!
	</div>
</div>
