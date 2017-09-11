<div class="well well-lg">
  <?= $this->session->flashdata("alert") ?>
  <div class="page-header">
    <h2>Doações</h2>
    <span class="text-info">
        <h3>Total: <?=isset($sum) ? 'R$ '. number_format($sum,2) : number_format(0,2) ?></h3>
    </span>

    <div class="">
      <form class="form-inline" action="<?=base_url('donations/filter')?>" method="post">
        <div class="input-group input-group-sm">
            <span class="input-group-addon">Data de</span>
            <input type="date" class="form-control"
              name="from_date"
              value="<?= isset($filter->from_date) ? $filter->from_date : date('Y-m-01') ?>"
              required/>
            <span class="input-group-addon">até</span>
            <input type="date" class="form-control"
              name="to_date"
              value="<?= isset($filter->to_date) ? $filter->to_date : date('Y-m-t') ?>"
              required/>

            <span class="input-group-addon">Status de Pagamento</span>
            <select class="form-control" name="status">
              <?php $s = isset($filter->status) ? $filter->status : 0; ?>
              <option value="0">Selecione</option>
              <option value="1" <?=$s==1?'selected':''?>>Em aberto</option>
              <option value="2" <?=$s==2?'selected':''?>>Recebido</option>
              <option value="3" <?=$s==3?'selected':''?>>Vencido</option>
              <option value="4" <?=$s==4?'selected':''?>>Pago Vencido</option>
            </select>

            <span class="input-group-addon">Tipo de Pagamento</span>
            <select class="form-control" name="id_payment_type">
              <option value="0">Selecione</option>
              <?php foreach($payment_types as $pt): ?>
                <option value="<?=$pt->id_payment_type?>" <?php if (isset($filter->id_payment_type)){echo $filter->id_payment_type == $pt->id_payment_type ? 'selected':'';} ?> ><?=$pt->description_payment?></option>
              <?php endforeach ?>
            </select>

            <!--<span class="input-group-addon">Associado</span>
            <select class="form-control" name="id_associate">
              <option value="0">Selecione</option>
              <?php foreach($associated as $a): ?>
                <option value="<?=$a->id_associate?>" <?php if (isset($filter->id_associate)){echo $filter->id_associate == $a->id_associate ? 'selected':'';} ?> ><?=$a->name_associate?></option>
              <?php endforeach ?>
            </select>-->

            <!--<select class="input-md form-control" name="status">
              <option value="0">Ordenado Por</option>
              <option value="1">Mais Novo</option>
              <option value="2">Mais Antigo</option>
            </select>-->

        </div>
        <p />
        <div class="input-group input-group-sm">

          <span class="input-group-addon">Frequência</span>
          <select class="form-control" name="id_frequency">
            <option value="0">Selecione</option>
            <?php foreach($frequencies as $f): ?>
              <option value="<?=$f->id_frequency?>" <?php if (isset($filter->id_frequency)){echo $filter->id_frequency == $f->id_frequency ? 'selected':'';} ?> ><?=$f->frequency_description?></option>
            <?php endforeach ?>
          </select>

          <span class="input-group-addon">Busca</span>
          <input type="text" class="form-control"
            name="search" placeholder="Associados, Observações..."
            value="<?= isset($filter->search) ? $filter->search : ''?>" />

          <span class="input-group-btn">
            <button type="submit" name="submit" class="btn btn-info">
              <span class="glyphicon glyphicon-search"></span> Buscar
            </button>
          </span>

          <span class="input-group-btn">
            <a href="<?=base_url('donations')?>" name="submit" class="btn btn-danger">
              <span class="glyphicon glyphicon-trash"></span> Limpar
            </a>
          </span>
        </div>

      </form>
    </div>
  </div>

  <div class="">
    <table class="table table-responsive table-striped table-hover text-center">
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
              <td><?=$r->uuid_associate?></td>
              <td><?=$r->name_associate?></td>
              <td><?=date_format(date_create($r->duo_date_collection), 'd/m/y')?></td>
              <td>
                <?php if ($r->payday_collection != NULL) { ?>
                  <span class="label label-success">Pago dia <?=date_format(date_create($r->payday_collection), 'd/m/y')?> </span>
                <?php } else if ($r->payday_collection == NULL && $r->duo_date_collection < date('Y-m-d') ) { ?>
                  <span class="label label-danger">Vencido há <?=date_create($r->duo_date_collection)->diff(new DateTime())->d?> dia(s)</span>
                <?php } else { ?>
                  <span class="label label-warning">Pendente</span>
                <?php } ?>
              </td>
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
