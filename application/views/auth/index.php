<div class="well well-lg">
	<div class="page-header">
		<h2><?php echo lang('index_heading');?></h2>
		<p><?php echo lang('index_subheading');?></p>
		<p>
			<?php echo anchor('auth/create_user', lang('index_create_user_link'), "class='btn btn-success'")?>
    	<?php echo anchor('auth/create_group', lang('index_create_group_link'), "class='btn btn-primary'")?>
		</p>

	</div>

	<div class="text-danger" id="infoMessage"><?php echo $message;?></div>

	<table class="table table-responsive table-hover">
		<thead>
			<tr>
				<th><?php echo lang('index_fname_th');?></th>
				<th><?php echo lang('index_lname_th');?></th>
				<th><?php echo lang('index_email_th');?></th>
				<th><?php echo lang('index_groups_th');?></th>
				<th><?php echo lang('index_status_th');?></th>
				<th><?php echo lang('index_action_th');?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($users as $user):?>
				<tr>
          <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
          <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
          <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
					<td>
						<?php foreach ($user->groups as $group):?>
							<?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
            <?php endforeach?>
					</td>
					<td>
						<?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?>
					</td>
					<td>
						<?php echo anchor("auth/edit_user/".$user->id, "<span class='glyphicon glyphicon-edit'></span>", "class='btn btn-sm btn-primary'") ;?>
						<button <?= ($this->ion_auth->user()->row()->username == $user->username ? "disabled":"") ?> data-model="<?= $user->id ?>" data-toggle="modal" data-target="#delete_modal" class="btn btn-danger btn-sm" href="#">
			        <span class="glyphicon glyphicon-trash"></span>
			      </button>
					</td>
				</tr>
			<?php endforeach;?>
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
				<p>Tem certeza que deseja apagar este Usuário?</p>
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
			window.location.href = "auth/delete_user/"+ id;
		});
	})();
</script>
