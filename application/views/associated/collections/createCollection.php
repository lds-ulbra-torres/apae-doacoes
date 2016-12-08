<script src="<?=base_url('assets/js/associated/associated.js')?>" charset="utf-8"></script>
<div class="well well-lg">
  <div class="page-header">
    <h2>Cadastrar Cobrança</h2>
  </div>

  <?php $baseUrl = base_url('associated/'. $this->uri->segment(2) .'/collections') ?>

  <div class="form-horizontal">

    <form action="<?=$baseUrl .'/create'?>" method="post">
      <div class="form-group">
        <label for="id_associate" class="col-sm-3">ID Associado</label>
        <div class="col-md-4">
          <input type="number" name="id_associate" value="<?=$this->uri->segment(2)?>" class="form-control"
          readonly>
        </div>
      </div>

      <div class="form-group">
        <div id="validation_errors" class="container row">
          <?= form_error('duo_date_collection','<div id="error_duo_date_collection" class="error col-sm-4 alert alert-warning alert-dismissible" role="alert">', '</div>') ?>
        </div>
        <label for="duo_date_collection" class="col-sm-3">Data de Vencimento</label>
        <div class="col-md-4">
          <input required type="date" name="duo_date_collection" id="duo_date_collection" value="<?=set_value('duo_date_collection', isset($collection->duo_date_collection) ? date('Y-m-d', strtotime($collection->duo_date_collection)) : '')?>" class="form-control">
        </div>
      </div>

      <div class="form-group">
        <div id="validation_errors" class="container row">
          <?= form_error('value_collection','<div id="error_value_collection" class="error col-sm-4 alert alert-warning alert-dismissible" role="alert">', '</div>') ?>
        </div>
        <label for="value_collection" class="col-sm-3">Valor de Contribuição</label>
        <div class="col-md-4">
          <input required type="number" name="value_collection" id="value_collection" value="<?=set_value('value_collection', isset($collection->value_collection) ? $collection->value_collection : '')?>" class="form-control">
        </div>
      </div>

      <div class="form-group">
        <label for="payday_collection" class="col-sm-3">Data de Pagamento</label>
        <div class="col-md-4">
          <input type="date" name="payday_collection" value="<?=set_value('duo_date_collection', isset($collection->value_collection) ? date('Y-m-d', strtotime($collection->payday_collection)) : '')?>" class="form-control">
        </div>
      </div>

      <div class="form-group">
        <div id="validation_errors" class="container row">
          <?= form_error('num_collection','<div id="error_num_collection" class="error col-sm-4 alert alert-warning alert-dismissible" role="alert">', '</div>') ?>
        </div>
        <label for="num_collection" class="col-sm-3">Nro de Parcela</label>
        <div class="col-md-4">
          <input required type="number" name="num_collection" id="num_collection" value="<?=set_value('num_collection', isset($collection->num_collection) ? $collection->num_collection : '')?>" class="form-control">
        </div>
      </div>

      <div class="form-group">
        <label for="obs_collection" class="col-sm-3">Observações</label>
        <div class="col-md-4">
          <textarea name="obs_collection" value="<?=set_value('obs_collection', isset($collection->obs_collection) ? $collection->obs_collection : '')?>" class="form-control"></textarea>
        </div>
      </div>

      <div class="form-group">
        <a class="btn btn-default" href="<?=$baseUrl?>"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>
        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
      </div>
    </form>

  </div>
</div>
