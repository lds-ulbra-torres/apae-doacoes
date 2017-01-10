<div class="well well-lg">
  <div class="page-header">
    <h2>Alterar Cobrança</h2>
  </div>

  <?php $baseUrl = base_url('associated/'. $collection->id_associate .'/collections') ?>

  <div class="form-horizontal">
    <form class="" action="<?=$baseUrl .'/update'?>" method="post">
      <div class="form-group">
        <label for="id_associate" class="col-sm-3">ID Associado</label>
        <div class="col-md-4">
          <input type="number" name="id_associate" value="<?=$collection->id_associate?>" class="form-control"
          readonly>
        </div>
      </div>

      <div class="form-group">
        <label for="id_collection" class="col-sm-3">ID Cobrança</label>
        <div class="col-md-4">
          <input type="number" name="id_collection" value="<?=$collection->id_collection?>" class="form-control"
          readonly>
        </div>
      </div>

      <div class="form-group">
        <label for="duo_date_collection" class="col-sm-3">Data de Vencimento</label>
        <div class="col-md-4">
          <input type="date" name="duo_date_collection" value="<?=date('Y-m-d', strtotime($collection->duo_date_collection))?>" class="form-control">
        </div>
      </div>

      <div class="form-group">
        <label for="value_collection" class="col-sm-3">Valor de Contribuição</label>
        <div class="col-md-4">
          <input type="text" name="value_collection" value="<?=$collection->value_collection?>" class="form-control">
        </div>
      </div>

      <div class="form-group">
        <label for="payday_collection" class="col-sm-3">Data de Pagamento</label>
        <div class="col-md-4">
          <input type="date" name="payday_collection" value="<?=$collection->payday_collection != null ? date('Y-m-d', strtotime($collection->payday_collection)) : ''?>" class="form-control">
        </div>
      </div>

      <div class="form-group">
        <label for="obs_collection" class="col-sm-3">Observações</label>
        <div class="col-md-4">
          <textarea name="obs_collection" class="form-control"><?=$collection->obs_collection?></textarea>
        </div>
      </div>

      <?php if (isset($returnUrl)) { ?>
        <input type="hidden" name="returnUrl" value="<?=$returnUrl?>">
      <?php } ?>

      <div class="form-group">
        <a class="btn btn-default" href="<?=isset($returnUrl) ? $returnUrl:$baseUrl?>"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>
        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</a>
      </div>
    </form>

  </div>
</div>
