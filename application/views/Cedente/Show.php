
<div class="well well-lg">
    <div class="page-header">
        <h2>Cedente</h2>
    </div>
    <div class="row col-sm-12">
      <div class="dl-horizontal">

          <dt class="col-md-3">Razão Social</dt>
          <dd><?= $cedente['razao_social'] ?></dd>

          <dt class="col-md-3">Codigo</dt>
          <dd><?= $cedente['cod_cedente'] ?></dd>

          <dt class="col-md-3">Nro Agência</dt>
          <dd><?= $cedente['num_agencia'] ?></dd>

          <dt class="col-md-3">Nro Operação</dt>
          <dd><?= $cedente['num_operacao'] ?></dd>

          <dt class="col-md-3">Conta Corrente</dt>
          <dd><?= $cedente['num_conta_corrente'] ?></dd>

          <dt class="col-md-3">CNPJ</dt>
          <dd><?= $cedente['cnpj'] ?></dd>

          <dt class="col-md-3">Cidade</dt>
          <dd><?= $cedente['name_city'] ?></dd>

      </div>
    </div>
    <br>
    <a class="btn btn-default" href="<?= site_url('cedentes'); ?>"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>
</div>
