<div class="well well-lg container">

  <div class="row">
    <div class="dl-horizontal row col-sm-8">
      <dt>Nome do Proprietário</dt>
      <dd><?= $partner['name_partner'] ?></dd>
      <hr>
      <dt>Contato</dt>
      <dd><?= $partner['name_contact'] ?></dd>
      <hr>
      <dt>Telefone</dt>
      <dd><?= $partner['phone'] ?></dd>
      <hr>
      <dt>E-mail</dt>
      <dd><?= $partner['email'] ?></dd>
      <hr>
      <dt>Mensagem</dt>
      <dd><?= $partner['message'] ?></dd>
      <hr>

     <a class="btn btn-info" href="<?=base_url('newPartners')?>"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>
    </div>

  </div>
