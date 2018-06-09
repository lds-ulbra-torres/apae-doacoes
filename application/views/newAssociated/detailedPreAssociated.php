<div class="well well-lg container">

  <div class="row">
    <div class="dl-horizontal row col-sm-8">
      <dt>Nome</dt>
      <dd><?= $associated['name_associated'] ?></dd>
      <hr>
      <hr>
      <dt>Telefone Celular</dt>
      <dd><?= $associated['phone_cel'] ?></dd>
      <hr>
      <dt>Telefone Residencial</dt>
      <dd><?= $associated['phone_home'] ?></dd>
      <hr>
      <dt>Telefone Comercial</dt>
      <dd><?= $associated['phone_commerce'] ?></dd>
      <hr>
      <dt>E-mail</dt>
      <dd><?= $associated['email'] ?></dd>
      <hr>

     <a class="btn btn-info" href="<?=base_url('newAssociateds')?>"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>
    </div>

  </div>
