<div class="well well-lg">
  <div class="page-header">
    <h2>Cadastrar Cobrança</h2>

  </div>

  <div class="form-horizontal">
    <form class="" action="index.html" method="post">

      <div class="form-group row">
        <label for="id_payment_type" class="col-sm-3 col-form-label">Tipo de Pagamento</label>
        <div class="col-sm-4">
          <select class="form-control" name="id_payment_type" id="id_payment_type">
              <?php foreach ($payment_types as $pt) { ?>
              <option value="<?= $pt['id_payment_type'] ?>">
                  <?= $pt['description_payment'] ?>
              </option>
              <?php } ?>
          </select>
        </div>
      </div>

      <div class="form-group row">
         <div id="validation_errors" class="container row">
           <?= form_error('birth_date','<div id="error_birth_date" class="col-sm-4 alert-warning alert-dismissible" role="alert">', '</div>') ?>
         </div>
         <label for="birth_date" class="col-sm-3 col-form-label">Data para Vencimento</label>
         <div class="col-sm-4">
           <input class="form-control" type="date" name="duo_date_collection" value="">
        </div>
      </div>
    </form>
  </div>
</div>
