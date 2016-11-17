<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <div class="container">

      <div class="row">

        <h1>Atualizar carteira</h1>

        <ol class="breadcrumb">
              <li><a href="<?= base_url("carteiras") ?>">Voltar</a></li>
              <li class="active">Atualizar carteira</li>
        </ol>



        <?php foreach ($carteiras as $carteira) { ?>
        <form action="<?php echo base_url('carteiras/edit')."/". $carteira['id_carteira'];?>" name="form_att" method="post">
          <div class="row">
            <div class="col-md-8">
              <label>Nome da carteira</label>
              <input type="text" name="nome" value="<?php echo $carteira['nome_carteira']  ?>" class="form-control">
            </div>
          </div>


          <div class="row">
            <div class="col-md-8">
              <label>Numero da carteira</label>
              <input type="text" name="num_carteira" value="<?php echo $carteira['nume_carteira']  ?>" size="50" class="form-control">
            </div>
          </div>


          <div class="row">
            <div class="col-md-8">
              <label>Numero do contrato</label>
              <input type="text" name="num_contrato" value="<?php echo $carteira['nume_contrato']  ?>" size="50" class="form-control">
            </div>
          </div>


          <div class="row">
            <div class="col-md-8">
              <label>Numero do convenio</label>
              <input type="text" name="num_convenio" value="<?php echo $carteira['nume_convenio']  ?>" size="50" class="form-control">
            </div>
          </div>

          <div class="row">
            <div class="col-md-8">
              <label>Numero ultimo boleto</label>
              <input type="text" name="nosso_num" value="<?php echo $carteira['nosso_numero']  ?>" size="50" class="form-control">
            </div>
          </div>


          <br />

          <div class="row">
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary">Alterar</button>
            </div>
          </div>
        </form>
        <?php } ?>
      </div>
    </div>
