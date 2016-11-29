<?php
/**
 * Created by PhpStorm.
 * User: LeoSorgetz
 * Date: 01/11/2016
 * Time: 01:11
 */
//var_dump($cidades)
?>

<!--
<?php if (isset($error)) { ?>
<div class="panel panel-danger">
    <div class="panel-heading">Erro -</div>
    <div class="panel-body"><?= $error ?></div>
</div>
<?php
} ?>
-->

<div class="well well-lg">
  <div class="page-header">
      <h1>Cadastro de Cedente</h1>
  </div>
    <form action="<?= site_url('cedentes/create') ?>" method="post">
        <div class="form-horizontal">

          <div class="form-group">
              <label>Codigo do Cedente:</label>
              <input type="number" class="form-control" name="cedente[cod_cedente]" placeholder="Codigo do Cedente.." required>
          </div>

          <div class="form-group">
              <label>Numero da agencia:</label>
              <input type="number" min="0" class="form-control" name="cedente[num_agencia]" placeholder="Numero da agencia.."
              required>
          </div>

          <div class="form-group">
              <label>Numero da operação:</label>
              <input type="number" class="form-control" name="cedente[num_operacao]" placeholder="Numero da operação.."
              required>
          </div>

          <div class="form-group">
              <label>Numero da conta corrente:</label>
              <input type="number" class="form-control" name="cedente[num_conta_corrente]"
              placeholder="Numero da conta corrente.." required>
          </div>

          <div class="form-group">
              <label>CNPJ:</label>
              <input type="number" class="form-control" name="cedente[cnpj]" placeholder="CNPJ.." required>
          </div>

          <div class="form-group">
              <label>Razão Social:</label>
              <input type="text" class="form-control" name="cedente[razao_social]" placeholder="Razão Social.." required>
          </div>

          <div class="form-group">
              <label>Banco:</label>
              <select class="form-control" name="cedente[id_bank]">
                  <?php foreach ($bancos as $banco) { ?>
                  <option value="<?= $banco['id_bank'] ?>">
                      <?= $banco['name_bank'] ?>
                  </option>
                  <?php } ?>
              </select>
          </div>

          <div class="form-group">
              <label>Cidade:</label>
              <select class="form-control" name="cedente[id_cidade]">
                  <?php foreach ($cidades as $cidade) { ?>
                  <option value="<?= $cidade['id_city'] ?>">
                      <?= $cidade['name_city'] ?>
                  </option>
                  <?php } ?>
              </select>
          </div>
          <div class="form-group">
              <a class="btn btn-default" href="<?= site_url('cedentes') ?>"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>
              <button class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
          </div>
        </div>
    </form>
</div>
