<script src="<?= base_url('assets/js/notification/notification.js') ?>" charset="utf-8"></script>
<div class="well well-lg">
  <div class="page-header">
    <h2>Parceiros</h2>
  </div>

  
   <?= $this->session->flashdata('alert') ?>

   <table class="table table-responsive table-striped table-hover">
    <thead>
      <tr>

        <th>Nome da Empresa</th>
        <th>Contato</th>
        <th>Telefone</th>
        <th>E-mail</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
     <?php foreach ($partners as $partner) :?>
      <tr>
        <td><?= $partner->name_partner ?></td>
        <td><?= $partner->name_contact ?></td>
        <td><?= $partner->phone ?></td>
        <td><?= $partner->email?></td>
        <td>  <div class="btn-group">
          <a class="btn btn-info btn-sm confirm-partner-btn" id="<?= $partner->id_pre_partner ?>" data-toggle="modal" data-target="#delete_modal" href="#">
          <span class="glyphicon glyphicon-ok-sign"></span></a>
          <a class="btn btn-primary btn-sm" href="<?= base_url('notification/detailPartner/'.  $partner->id_pre_partner) ?>">
          <span class="glyphicon glyphicon-eye-open"></span></a>
        </div></td>
      </tr>
      <?php endforeach; ?>
   </tbody>
  </table>
  <div class="row">
        <div class="col-md-12 text-center">
            <?= $pagination ?>
        </div>
  </div>

  <div class="modal fade" id="delete_modal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">Confirmar</h4>
        </div>
        <div class="modal-body">
          <p>Qual situação deste pré-parceiro?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
          <a href="#" id="refusedPertner" type="button" class="btn btn-danger">Recusado</a>
          <a href="#" id="becamePertner" type="button" class="btn btn-success">Tornou-se Parceiro</a>
        </div>
      </div>
    </div>
  </div>
</div>
