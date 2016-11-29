<div class="well well-lg">
  <div class="page-header">
    <h2>Cobranças</h2>
    <a class="btn btn-default" href="<?=base_url('associated')?>"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>
    <a class="btn btn-success" href="#"><span class="glyphicon glyphicon-plus"></span> Cadastrar Cobrança</a>
  </div>
  <table class="table table-responsive table-hover">
    <thead>
      <tr>
        <td>ID</td>
        <td>Vencimento</td>
        <td>Valor</td>
        <td>Status</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach($collections as $c): ?>
        <tr>
          <td><a href="#"><?= $c->id_collection ?></a></td>
          <td><?= date_format(date_create($c->duo_date_collection), 'd/m/y') ?></td>
          <td><?= $c->value_collection ?></td>
          <td><?= $c->payday_collection != null ? "<span class='label label-success'>Pago dia ". date_format(date_create($c->payday_collection), 'd/m/y') ."</span>" : "<span class='label label-warning'>Pendente</span>" ?></td>
          <td>
            <div class="btn-group">
              <a class="btn btn-info" href="#"><span class="glyphicon glyphicon-eye-open"></span></a>
              <a class="btn btn-primary" href="#"><span class="glyphicon glyphicon-edit"></span></a>
              <a class="btn btn-danger" href="#"><span class="glyphicon glyphicon-trash"></span></a>
            </div>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
  <div class="row">
    <div class="col-md-12 text-center">
      <?= $pagination ?>
    </div>
  </div>
</div>
