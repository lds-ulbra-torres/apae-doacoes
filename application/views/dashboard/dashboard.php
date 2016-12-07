<div class="well well-lg">

  <div class="page-header">
    <h2>Doações</h2>

  </div>

  <div class="pull-right">
    <span class="input-lg">
        <p>Total: <?=isset($sum) ? 'R$: '. number_format($sum,2) : number_format(0,2) ?></p>
    </span>
  </div>

  <div class="form-inline">

    <form class="" action="<?=base_url('donations/filter')?>" method="post">
      <div class="input-group">
          <span class="input-group-addon">De</span>
          <input type="date" class="input-md form-control"
            name="from_date"
            value="<?= isset($filter->from_date) ? $filter->from_date : date('Y-m-01') ?>"
            required/>
          <span class="input-group-addon">Até</span>
          <input type="date" class="input-md form-control"
            name="to_date"
            value="<?= isset($filter->to_date) ? $filter->to_date : date('Y-m-t') ?>"
            required/>

          <span class="input-group-addon">Status</span>
          <select class="input-md form-control" name="status">
            <?php $s = isset($filter->status) ? $filter->status : 0; ?>
            <option value="0">Status de Pagamento</option>
            <option value="1" <?=$s==1?'selected':''?>>Em aberto</option>
            <option value="2" <?=$s==2?'selected':''?>>Recebido</option>
            <option value="3" <?=$s==3?'selected':''?>>Vencido</option>
            <option value="4" <?=$s==4?'selected':''?>>Pago Vencido</option>
          </select>

          <span class="input-group-addon">Associado</span>
          <select class="input-md form-control" name="id_associate">
            <option value="0">Selecione um Associado</option>
            <?php foreach($associated as $a): ?>
              <option value="<?=$a->id_associate?>" <?php if (isset($filter->id_associate)){echo $filter->id_associate == $a->id_associate ? 'selected':'';} ?> ><?=$a->name_associate?></option>
            <?php endforeach ?>
          </select>

          <!--<select class="input-md form-control" name="status">
            <option value="0">Ordenado Por</option>
            <option value="1">Mais Novo</option>
            <option value="2">Mais Antigo</option>
          </select>-->

          <span class="input-group-btn">
            <button type="submit" name="submit" class="btn btn-info">
              <span class="glyphicon glyphicon-search"></span> Buscar
            </button>
          </span>

          <?php if(isset($results)) { ?>
            <span class="input-group-btn">
              <a href="<?=base_url('dashboard')?>" name="submit" class="btn btn-info">
                <span class="glyphicon glyphicon-trash"></span>
              </a>
            </span>
          <?php } ?>

      </div>
    </form>

  </div>


  <div class="">
    <table class="table table-responsive table-hover">
      <thead>
        <tr>
          <th>Código Associado</th>
          <th>Nome Associado</th>
          <th>Data Vencimento</th>
          <th>Data Pagamento</th>
          <th>Valor Pagamento</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php if(isset($results)) { ?>
          <?php foreach($results as $r): ?>
            <tr>
              <td><?=$r->id_associate?></td>
              <td><?=$r->name_associate?></td>
              <td><?=date_format(date_create($r->duo_date_collection), 'd/m/y')?></td>
              <td><?= $r->payday_collection != null ? "<span class='label label-success'>Pago dia ". date_format(date_create($r->payday_collection), 'd/m/y') ."</span>" : "<span class='label label-warning'>Pendente</span>" ?></td>
              <td><?= 'R$ '. number_format($r->value_collection,2) ?></td>
              <td>
                <div class="btn-group">
                  <a class="btn btn-primary btn-sm" title="Alterar Cobrança" href="<?=base_url('donations/edit-collection/'. $r->id_collection)?>"><span class="glyphicon glyphicon-edit"></span></a>
                </div>
              </td>
            </tr>
          <?php endforeach ?>
      <?php } ?>
      </tbody>
    </table>

    <div class="row">
        <div class="col-md-12 text-center">
            <?= $pagination ?>
        </div>
    </div>
  </div>
</div>
