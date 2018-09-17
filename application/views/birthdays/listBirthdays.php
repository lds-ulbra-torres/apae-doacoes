<div class="well well-lg">
  <?= $this->session->flashdata('alert') ?>
  <div class="page-header">
    <h2>Aniversariantes</h2>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-4 no-padding-left">
                <a class="btn btn-success" href="<?= base_url('associated/new') ?>">
                  <span class="glyphicon glyphicon-plus"></span> Cadastrar Associado
                </a>
            </div>

            <div class="col-xs-8 no-padding-right">
                <form method="GET" action="<?=base_url('birthdays/search')?>" class="form-inline">
                    <div class="input-group pull-right" >

            <select name="month" class="dropdown form-control">
                <?php foreach ($months as $month):  ?>
                    <?php if( $mesAtual == $month -> id_month ){ ?>
                        <option value="<?= $month -> id_month ?>" selected ><?= $month -> name_month ?></option>
                    <?php } else { ?>
                        <option value="<?= $month -> id_month ?>"><?= $month -> name_month ?></option>
                    <?php } ?>
                <?php endforeach; ?>
            </select>
                        <span  class="input-group-btn width-min" >
                            <button type="submit" class="btn btn-info">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>

  <div class="">

    <?= $this->session->flashdata('alert') ?>

    <table class="table table-associated table-responsive table-striped table-hover text-center">
      <thead>
        <tr>
          <th>Código Único</th>
          <th>Nome</th>
          <th>Data Nascimento</th>
          <th></th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($birthdays as $birthday): ?>
        <tr>
          <td><a href="<?=base_url('associated-detail/'. $birthday->id_associate)?>"><?= $birthday->uuid_associate ?></a></td>
          <td><?= $birthday->name_associate ?></td>
          <td><?= date_format(date_create($birthday->birth_date), 'd/m/y')?></td>
          <td><?php if($birthday->disable == 1){ echo '<span class="label label-danger">Inativo</span>'; } ?></td>
          <td>
            <div class="btn-group">
              <a class="btn btn-info btn-sm" href="<?= base_url('associated-detail/'. $birthday->id_associate) ?>"><span class="glyphicon glyphicon-eye-open"></span></a>
              <a class="btn btn-primary btn-sm" href="<?= base_url('associated/edit/'. $birthday->id_associate) ?>"><span class="glyphicon glyphicon-edit"></span></a>
              <a class="btn btn-warning btn-sm" href="<?= base_url('associated/'. $birthday->id_associate .'/collections') ?>"><span class="glyphicon glyphicon-usd"></span></a>
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
