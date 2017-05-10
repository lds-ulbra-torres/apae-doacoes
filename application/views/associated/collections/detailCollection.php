<div class="well well-lg">
  <div class="page-header">
    <h2>Cobrança</h2>
  </div>

  <?= $this->session->flashdata('alert') ?>

  <?php $baseUrl = base_url('associated/'. $collection->id_associate .'/collections') ?>

  <div class="dl-horizontal">

    <dt>Nro de Parcela</dt>
    <dd><?=$collection->num_collection?></dd>
    <dt>Valor de Contribuição</dt>
    <dd><?='R$ '. number_format($collection->value_collection,2)?></dd>
    <hr>
    <dt>Data de Vencimento</dt>
    <dd><?=date('d/m/Y', strtotime($collection->duo_date_collection))?></dd>
    <dt>Data de Pagamento</dt>
    <dd><?=$collection->payday_collection != null ? date('d/m/Y', strtotime($collection->payday_collection)) : ""?></dd>
    <hr>
    <dt>Observações</dt>
    <dd><?=$collection->obs_collection?></dd>
    <hr>
    <dt>Criado por</dt>
    <dd><?=$collection->createdBy?></dd>
    <dt>Criado em</dt>
    <dd><?=date_format(date_create($collection->createdDate), 'd/m/Y á\s\ H:i:s')?></dd>
    <dt>Última modificação por</dt>
    <dd><?=$collection->lastModifiedBy?></dd>
    <dt>Última modificação em</dt>
    <dd><?=date_format(date_create($collection->lastModifiedDate), 'd/m/Y á\s\ H:i:s')?></dd>
    <br>
    <div class="form-group">
      <a class="btn btn-default" href="<?=isset($returnUrl) ? $returnUrl:$baseUrl?>"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>
      <a class="btn btn-primary" href="<?=$baseUrl .'/'. $collection->id_collection .'/edit'?>"><span class="glyphicon glyphicon-edit"></span> Alterar</a>
    </div>

  </div>
</div>
