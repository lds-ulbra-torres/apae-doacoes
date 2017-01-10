
<div class="well well-lg">
  <div class="page-header">
    <h2>Associados</h2>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-4 no-padding-left">
                <a class="btn btn-success" href="<?= base_url('associated/new') ?>">
                  <span class="glyphicon glyphicon-plus"></span> Cadastrar Associado
                </a>
            </div>

            <div class="col-xs-8 no-padding-right">
                <form method="GET" action="<?=base_url('associated/search')?>" class="form-inline">
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
                              <a href="<?=base_url('associated')?>" class="btn btn-info">
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

  <div class="">

    <?= $this->session->flashdata('alert') ?>

    <table class="table table-responsive table-striped table-hover">
      <thead>
        <tr>
          <th>Código Único</th>
          <th>Nome</th>
          <th>Data Nascimento</th>
          <th>RG</th>
          <th>CPF</th>
          <th></th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($associated as $associate): ?>
        <tr>
          <td><a href="<?=base_url('associated/'. $associate->id_associate)?>"><?= $associate->uuid_associate ?></a></td>
          <td><?= $associate->name_associate ?></td>
          <td><?= date_format(date_create($associate->birth_date), 'd/m/y')?></td>
          <td><?= $associate->rg ?></td>
          <td><?= $associate->cpf ?></td>
          <td><?php if($associate->disable == 1){ echo '<span class="label label-danger">Inativo</span>'; } ?></td>
          <td>
            <div class="btn-group">
              <a class="btn btn-info btn-sm" href="<?= base_url('associated-detail/'. $associate->id_associate) ?>"><span class="glyphicon glyphicon-eye-open"></span></a>
              <a class="btn btn-primary btn-sm" href="<?= base_url('associated/edit/'. $associate->id_associate) ?>"><span class="glyphicon glyphicon-edit"></span></a>
              <a class="btn btn-warning btn-sm" href="<?= base_url('associated/'. $associate->id_associate .'/collections') ?>"><span class="glyphicon glyphicon-usd"></span></a>
            </div>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
    <div class="row">
        <div class="col-md-12 text-center">
            <?= $pagination ?>
        </div>
    </div>
  </div>

</div>
