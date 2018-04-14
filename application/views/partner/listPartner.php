<script src="<?= base_url('assets/js/partner/partner.js') ?>" charset="utf-8"></script>

<div class="well well-lg">
  <div class="page-header">
    <h2>Parceiros</h2>

    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-4 no-padding-left">
          <a class="btn btn-success" href="<?= base_url('partner/new') ?>">
            <span class="glyphicon glyphicon-plus"></span> Cadastrar Parceiro
          </a>
        </div>
        <div class="col-xs-8 no-padding-right">
        <form method="GET" action="<?=base_url('partner/search')?>" class="form-inline">
            <div class="input-group pull-right" >
              <input type="text" class="form-control"
              name="q"
              value="<?=set_value('search', isset($search) ? $search : '')?>"
              placeholder="Buscar">
              <span  class="input-group-btn width-min" >
                <button type="submit" class="btn btn-info">
                  <span class="glyphicon glyphicon-search"></span>
                </button>
              </span>
              <?php if(isset($search)) { ?>
              <span  class="input-group-btn width-min" >
                <a href="<?=base_url('partner')?>" class="btn btn-info">
                  <span class="glyphicon glyphicon-trash"></span>
                </a>
              </span>
              <?php } ?>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

  
   <?= $this->session->flashdata('alert') ?>

   <table class="table table-responsive table-striped table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome da Empresa</th>
        <th>Categoria</th>
        <th>CNPJ/CPF</th>
        <th>Telefone</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
     <?php foreach ($partners as $partner) : 
        $idCategory = array_search($partner->category_id_category, array_column($category, 'id_category'));
      ?>
      <tr>
        <td><?= $partner->id_partner ?></td>
        <td><?= $partner->fantasy_name_partner ?></td>
        <td><?= $category[$idCategory]->name_category ?></td>
        <td><?= $partner->cnpj_cpf_partner ?></td>
        <td><?= $partner->commercial_phone_partner ?></td>
        <td>  <div class="btn-group">
          <a class="btn btn-info btn-sm" href="<?= base_url('partner/partner-detail/'. $partner->id_partner) ?>"><span class="glyphicon glyphicon-eye-open"></span></a>
          <a class="btn btn-primary btn-sm" href="<?= base_url('partner/edit/'.  $partner->id_partner) ?>"><span class="glyphicon glyphicon-edit"></span></a>
          <a class="btn btn-danger btn-sm delete-partner-btn" id="<?= $partner->id_partner ?>" data-toggle="modal" data-target="#delete_modal" href="#"><span class="glyphicon glyphicon-trash"></span></a>
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
          <h4 class="modal-title">Confirmar Exclusão</h4>
        </div>
        <div class="modal-body">
          <p>Tem certeza que deseja apagar este parceiro?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
          <a href="#" id="confirmDelete" type="button" class="btn btn-danger">Apagar</a>
        </div>
      </div>
    </div>
  </div>
</div>
