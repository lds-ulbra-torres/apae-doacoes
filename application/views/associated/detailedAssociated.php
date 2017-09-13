<div class="well well-lg container">

  <div class="page-header">
    <h2>Associado <strong><?=$associate->name_associate?></strong> <?php if($associate->disable == 1){ echo '<span class="label label-danger">Inativo</span>'; } ?></h2>
    <small style="color:gray">
      <?php $a = "Criado por <strong>"
        . $associate->created_by
        ."</strong> em "
        . date_format(date_create($associate->created_at), '\<\s\t\r\o\n\g\>d/m/Y\<\/\s\t\r\o\n\g\> á\s\ \<\s\t\r\o\n\g\>H:i:s\<\/\s\t\r\o\n\g\>')
        .", última modificação por <strong>"
        . $associate->last_modified_by
        ."</strong> em "
        . date_format(date_create($associate->last_modified_at), '\<\s\t\r\o\n\g\>d/m/Y\<\/\s\t\r\o\n\g\> á\s\ \<\s\t\r\o\n\g\>H:i:s\<\/\s\t\r\o\n\g\>');
          echo $a;
      ?>
    </small>

  </div>

  <?= $this->session->flashdata('alert') ?>
  <div class="row col-sm-12">
    <div class="dl-horizontal row col-sm-8">

      <dt>Código Único</dt>
      <dd><?= $associate->uuid_associate ?></dd>
      <dt>Nome Completo</dt>
      <dd><?= $associate->name_associate ?></dd>
      <dt>E-mail</dt>
      <dd><?= $associate->email_associate ?></dd>
      <hr>
      <dt>Data de Nascimento</dt>
      <dd><?= $associate->birth_date ?></dd>
      <dt>RG / Inscr. Estadual</dt>
      <dd><?= $associate->rg ?></dd>
      <dt>CPF / CNPJ</dt>
      <dd><?= $associate->cpf ?></dd>
      <hr>
      <h4>Endereço</h4>
      <dt>Rua</dt>
      <dd><?= $associate->street ?></dd>
      <dt>Número</dt>
      <dd><?= $associate->number ?></dd>
      <dt>Bairro</dt>
      <dd><?= $associate->neighborhood ?></dd>
      <dt>Complemento</dt>
      <dd><?= $associate->complement ?></dd>
      <dt>Cidade/Estado</dt>
      <dd><?= $associate->name_city .' - '. $associate->uf_state ?></dd>
      <hr>
      <h4>Financeiro</h4>
      <dt>Método de Pagamento</dt>
      <dd><?=$associate->description_payment?></dd>
      <?php if ( (int) $associate->id_payment_type === 1) { ?>
        <dt>Nome no Cartão</dt>
        <dd><?= $associate->name_in_card ?></dd>
        <dt>Agência/Conta</dt>
        <dd><?=$associate->agency_number .' - '. $associate->account_number ?></dd>
        <hr>
      <?php } ?>
      <dt>Frequência</dt>
      <dd><?=$associate->frequency_description?></dd>
      <dt>Vencimento de Parcelas</dt>
      <dd><?=date_format(date_create($associate->duo_date), 'd/m/Y')?></dd>
      <dt>Valor de Contribuição</dt>
      <dd><?='R$ '. number_format($associate->value_frequency,2, ',', '.')?></dd>
      <hr>
      <dt>Observações</dt>
      <dd><?=$associate->obs?></dd>
      <hr>
    </div>

    <div class="row col-sm-3">
      <h4>Contatos</h4>
        <?php foreach ($contacts as $contact) : ?>
         <b><?= $contact['description_contact_type'] ?></b> <?= $contact['description_contact'] ?>
        <?php endforeach; ?>
    </div>
  </div>

  <div class="row col-sm-8">
    <a class="btn btn-default" href="<?= base_url('associated') ?>"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>
    <div class="pull-right">
      <a class="btn btn-primary" href="<?= base_url('associated/edit/'.$associate->id_associate) ?>">
        <span class="glyphicon glyphicon-edit"></span> Alterar
      </a>
      <?php if($associate->disable == 0) { ?>
        <a id="<?= $associate->id_associate ?>" data-toggle="modal" data-target="#inactive_modal" class="btn btn-warning" href="#">
          <span class="glyphicon glyphicon-ban-circle"></span> Inativar
        </a>
      <?php }else{ ?>
        <a id="<?= $associate->id_associate ?>" data-toggle="modal" data-target="#active_modal" class="btn btn-success" href="#">
          <span class="glyphicon glyphicon-ok-circle"></span> Ativar
        </a>
      <?php } ?>
      <a id="<?= $associate->id_associate ?>" data-toggle="modal" data-target="#delete_modal" class="btn btn-danger" href="#">
        <span class="glyphicon glyphicon-trash"></span> Apagar
      </a>

      <form class="alinhamentoRenovar" action="<?= base_url('associated/'.$associate->id_associate.'/collections/renew') ?>">
        <button class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Renovar</button>
      </form>
      <?php if($associate->term_route != "0"){ ?>
        <a class="btn btn-primary" target="_blank" href="<?= base_url($associate->term_route.'/'.$associate->id_associate) ?>">
          <span class="glyphicon glyphicon-file"></span> Imprimir autorização
        </a>
      <?php } ?>
    </div>
  </div>
</div>



<div class="modal fade" id="delete_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Confirmar Exclusão</h4>
      </div>
      <div class="modal-body">
        <p>Tem certeza que deseja apagar este associado?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
        <a href="<?= base_url('associated/delete/'.$associate->id_associate); ?>" id="confirmDelete" type="button" class="btn btn-danger">Apagar</a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="inactive_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Confirmar Inatividade</h4>
      </div>
      <div class="modal-body">
        <p>Tem certeza que deseja inativar este associado?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
        <a href=" <?= base_url('associated/inactive/'.$associate->id_associate); ?> " id="confirmInactive" type="button" class="btn btn-warning">Confirmar</a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="active_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Confirmar ativação</h4>
      </div>
      <div class="modal-body">
        <p>Tem certeza que deseja ativar este associado?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
        <a href=" <?= base_url('associated/active/'.$associate->id_associate); ?> " id="confirmInactive" type="button" class="btn btn-warning">Confirmar</a>
      </div>
    </div>
  </div>
</div>
