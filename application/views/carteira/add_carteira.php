<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <div class="container">

      <div class="row">

        <h1>Nova carteira</h1>

        <ol class="breadcrumb">
              <li><a href="<?= base_url("carteiras") ?>">Voltar</a></li>
              <li class="active">Nova carteira</li>
        </ol>




        <form action="carteiras/save" name="form_add" method="post">

          <div class="row">
            <div class="col-md-8">
              <label>Nome da carteira</label>
              <input type="text" name="nome" value="" class="form-control">
            </div>
          </div>


          <div class="row">
            <div class="col-md-8">
              <label>Numero da carteira</label>
              <input type="text" name="num_carteira" value="" size="50" class="form-control">
            </div>
          </div>


          <div class="row">
            <div class="col-md-8">
              <label>Numero do contrato</label>
              <input type="text" name="num_contrato" value="" size="50" class="form-control">
            </div>
          </div>


          <div class="row">
            <div class="col-md-8">
              <label>Numero do convenio</label>
              <input type="text" name="num_convenio" value="" size="50" class="form-control">
            </div>
          </div>

          <div class="row">
            <div class="col-md-8">
              <label>Numero ultimo boleto</label>
              <input type="text" name="nosso_num" value="" size="50" class="form-control">
            </div>
          </div>


          <br />

          <div class="row">
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
          </div>


        </form>
      </div>
    </div>
