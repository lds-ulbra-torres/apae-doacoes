<div class="well well-lg container">

  <div class="page-header">
    <h2>Parceiro <strong><?=$partner['fantasy_name_partner'] ?></strong> </h2>
  </div>
  <?= $this->session->flashdata('alert') ?>
  <div class="row">
    <div class="dl-horizontal row col-sm-8">
    <dt>Categoria</dt>
      <dd><?= $partner['name_category']?></dd>
      <hr>
      <dt>Nome do Proprietário</dt>
      <dd><?= $partner['owner_name_partner'] ?></dd>
      <hr>
      <dt>Desconto</dt>
      <dd><?= $partner['discount_partner'].'%' ?></dd>
      <hr>
      <dt>Telefone</dt>
      <dd><?= $partner['commercial_phone_partner'] ?></dd>
      <hr>
      <dt>Inscrição Estadual/RG</dt>
      <dd><?= $partner['rg_inscription_partner'] ?></dd>
      <hr>
      <dt>CNPJ/CPF</dt>
      <dd><?= $partner['cnpj_cpf_partner'] ?></dd>
      <hr>
      <dt>Endereço</dt>
      <dd>
          <?= $partner['street_partner'].' '.$partner['number_partner'].' '.$partner['neighborhood_partner'].' '.$partner['cep_partner'] ?>
      </dd>
      <hr>
       <dt>CEP</dt>
      <dd><?= $partner['cep_partner'] ?></dd>
      <hr>
      <dt>Cidade/Estado</dt>
      <dd><?= $partner['name_city'].' '.$partner['uf_state'] ?></dd>
      <br>

     <a class="btn btn-info" href="<?=base_url('partner')?>"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>
    </div>

      <div class="dl-horizontal row col-sm-4">
        <div class="full-center">
          <img class="partner_img" src="<?= base_url($partner['photo_partner'])?>" alt="<?= $partner['fantasy_name_partner']  ?>">
        </div>
      </div>

  </div>
