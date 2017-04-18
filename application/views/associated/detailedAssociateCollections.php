<header>
  <meta charset="utf-8">
</header>
<div class="well well-lg">
  <div class="page-header">
    <h2>Cobranças</h2>
    <a class="btn btn-success" href="<?= base_url('associated/'. $this->uri->segment(2) .'/collections/new') ?>"><span class="glyphicon glyphicon-plus"></span> Cadastrar Cobrança</a>
  </div>


  <div class="">
    <label class="col-md-2 col-form-label" for="competencia">Competência</label>
    <div class="col-sm-4">
      <select class="form-control" name="competencia">
        <?php
          $m = ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'];
          for($i=0;$i<12;$i++) print("<option value=". ($i+1) .">". $m[$i] ."</option>");
        ?>
      </select>
    </div>
    <table class="table table-responsive table-hover">
      <thead>
        <tr>
          <td>ID</td>
          <td>Valor</td>
          <td>Vencimento</td>
          <td>Descrição</td>
          <td>Status</td>
          <td>Ações</td>
        </tr>
      </thead>
      <tbody>
        <?php if( !empty($collections)) { ?>
          <?php foreach($collections as $c): ?>
            <tr>
              <td><?= $c->id_collection ?></td>
              <td><?= $c->value_collection ?></td>
              <td><?= $c->duo_date_collection ?></td>
              <td><?= $c->obs_collection ?></td>
              <td>status</td>
              <td>
                <div class="btn-group">
                  <a title="Não sei" class="btn btn-warning" href="#"><span class="glyphicon glyphicon-usd"></span></a>
                  <a title="Alterar Cobrança" class="btn btn-primary" href="#"><span class="glyphicon glyphicon-edit"></span></a>
                  <a title="Apagar Cobrança" class="btn btn-danger" href="#"><span class="glyphicon glyphicon-trash"></span></a>
                </div>
              </td>
            </tr>
          <?php endforeach ?>
        <?php } else { ?>
                <tr>
                  <td><p><strong>Não há Cobranças para a Competência selecionada.</strong></p></td>
                </div>
       <?php } ?>
      </tbody>
    </table>
  </div>


<!--
<div class="row">
    <div class="col-md-12 text-center">
        <?= $pagination ?>
    </div>
</div>
-->
</div>
