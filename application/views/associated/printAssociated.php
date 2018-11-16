<div class="well well-lg">
  <?= $this->session->flashdata('alert') ?>
  <div class="page-header">
    <h2>Associados imprimir envelopes</h2>

    <div class="container-fluid">
        <div class="row">

            <div class="col-xs-12 no-padding-right">
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
                              <a href="<?=base_url('associated')?>" class="btn btn-danger">
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
<form action="<?= base_url('associated/printEnvelope')?>" method="POST">
    <table class="table table-associatedPrint table-responsive table-striped table-hover text-center">
    <button type="submit" class="btn btn-success" value="Submit">Imprimir</button>
      <thead>
        <tr>
        <th><input type="checkbox" name="checkAll" id="checkAll"'/> </th>
          <th>Código Único</th>
          <th>Nome</th>
          <th>Endereço</th>
          <th>CEP</th>
          <th></th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($associated as $associate): ?>
        <tr>
          <td><input type="checkbox" name="checked[]" value="<?= $associate->id_associate ?>">  </td>
          <td><a href="<?=base_url('associated-detail/'. $associate->id_associate)?>"><?= $associate->uuid_associate ?></a></td>
          <td><?= $associate->name_associate ?></td>
          <td><?= $associate->street?>, <?=$associate->number?> </td>
          <td><?= $associate->cep ?></td>
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
</form>


<!--
    <div class="row">
        <div class="col-md-12 text-center">
            <?= $pagination ?>
        </div>
    </div>
  </div> 
-->
</div>
<script src="<?= base_url('assets/js/associated/associated.js') ?>" charset="utf-8"></script>