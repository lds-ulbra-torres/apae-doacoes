<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <div class="container">

      <div class="row">

        <h1>Informações</h1>

        <ol class="breadcrumb">
              <li><a href="<?= base_url("carteiras") ?>">Voltar</a></li>
              <li class="active">Info</li>
        </ol>



        <?php foreach ($carteiras as $carteira) { ?>
        <form action="">

          <div class="row">
            <div class="col-md-8">
              <label>ID da carteira</label>
              <input readonly="readonly" type="text" name="id" value="<?php echo $carteira['id_carteira']  ?>" class="form-control">
            </div>
          </div>

          <div class="row">
            <div class="col-md-8">
              <label>Nome da carteira</label>
              <input readonly="readonly" type="text" name="nome" value="<?php echo $carteira['nome_carteira']  ?>" class="form-control">
            </div>
          </div>


          <div class="row">
            <div class="col-md-8">
              <label>Numero da carteira</label>
              <input readonly="readonly" type="text" name="num_carteira" value="<?php echo $carteira['nume_carteira']  ?>" size="50" class="form-control">
            </div>
          </div>


          <div class="row">
            <div class="col-md-8">
              <label>Numero do contrato</label>
              <input readonly="readonly" type="text" name="num_contrato" value="<?php echo $carteira['nume_contrato']  ?>" size="50" class="form-control">
            </div>
          </div>


          <div class="row">
            <div class="col-md-8">
              <label>Numero do convenio</label>
              <input readonly="readonly" type="text" name="num_convenio" value="<?php echo $carteira['nume_convenio']  ?>" size="50" class="form-control">
            </div>
          </div>

          <div class="row">
            <div class="col-md-8">
              <label>Numero ultimo boleto</label>
              <input readonly="readonly" type="text" name="nosso_num" value="<?php echo $carteira['nosso_numero']  ?>" size="50" class="form-control">
            </div>
          </div>


          <br />
        </form>
        <?php } ?>
      </div>
    </div>
