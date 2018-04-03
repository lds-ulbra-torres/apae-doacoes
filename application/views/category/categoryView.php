<div class="well well-lg">
	<div class="page-header">
		<h2>Categorias</h2>
		<a class="btn btn-success" href="<?= site_url('category/add'); ?>" title="Cadastrar"><span class="glyphicon glyphicon-plus"></span> Cadastrar Categoria</a>

	</div>

	  <?= $this->session->flashdata('alert') ?>

	<table id="Tcategory" class="table table-responsive table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Categoria</th>
				<th>Descrição</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php if ($categories != null) {
				foreach ($categories as $category): ?>
					<tr>
						<td><?= $category->id_category; ?></td>
						<td><?= $category->name_category; ?></td>
						<td><?= $category->description_category; ?></td>
						<td>
							<div class="btn-group">
									<a class="btn btn-primary btn-sm" title="Editar"	href="<?php echo site_url('category/edit') . "/" . $category->id_category ?>">
										<span class="glyphicon glyphicon-edit"></span>
									</a>
									<a data-model="<?=$category->id_category?>" data-toggle="modal" data-target="#delete_modal" title="Apagar" class="btn btn-danger btn-sm" href="#">
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
	        <p>Tem certeza que deseja apagar esta Categoria?</p>
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
				window.location.href = "category/delete/"+ id;
	    })
	  })();
	</script>


	<div hidden id="sucessDelete" class="alert alert-success">
		<span class="glyphicon glyphicon-trash"></span>  Cadastro Exlcuido!
	</div>
</div>
