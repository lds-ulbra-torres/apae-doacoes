<script src="<?= base_url('assets/js/associated/associated.js') ?>" charset="utf-8"></script>
<div class="well well-lg container">
  <div class="page-header">
    <h2>Cadastro de Associado</h2>
  </div>
  <div class="row col-sm-12">
    <form method="POST" action="<?= base_url('associated/create'); ?>" id="create_associate">

      <div class="row col-sm-8">

        <div class="form-group row">
          <?= form_error('uuid_associate','<div class="row"><div class="alert alert-danger alert-dismissible col-md-8 col-md-offset-1" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div>') ?>
          <label for="name_associate" class="col-sm-3 col-form-label">Código Único</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" onchange="close('#uuidError')"
            id="uuid_associate" name="uuid_associate"
            value="<?= set_value('uuid_associate', isset($associate->uuid_associate) ? $associate->uuid_associate:''); ?>"
            placeholder="Código Universal Único"
            required />
          </div>
        </div>

        <div class="form-group row">
          <?= form_error('name_associate','<div class="row"><div class="alert alert-danger alert-dismissible col-md-8 col-md-offset-1" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div>') ?>
          <label for="name_associate" class="col-sm-3 col-form-label">Nome</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" onchange="close('#nameError')" id="name_associate" name="name_associate" value="<?= set_value('name_associate', isset($associate->name_associate) ? $associate->name_associate:''); ?>" placeholder="Nome Associado">
          </div>
        </div>

        <div class="form-group row">
          <?= form_error('birth_date','<div class="row"><div class="alert alert-danger alert-dismissible col-md-8 col-md-offset-1" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div>') ?>

         <label for="birth_date" class="col-sm-3 col-form-label">Aniversário</label>
         <div class="col-sm-8">
          <input type="date" class="form-control" onchange="close('#birthError')"
          id="birth_date" name="birth_date"
          value="<?= set_value('birth_date', isset($associate->birth_date) ? $associate->birth_date:''); ?>"
          required />
        </div>
      </div>

      <div class="form-group row">
        <?= form_error('rg','<div class="row"><div class="alert alert-danger alert-dismissible col-md-8 col-md-offset-1" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div>') ?>

      <label for="rg" class="col-sm-3 col-form-label">RG</label>
      <div class="col-sm-8">
        <input type="number" class="form-control"
        id="rg" name="rg" placeholder="RG" onchange="close('#rgError')"
        value="<?= set_value('rg', isset($associate->rg) ? $associate->rg:''); ?>" />
      </div>
    </div>

    <div class="form-group row">
      <?= form_error('cpf','<div class="row"><div class="alert alert-danger alert-dismissible col-md-8 col-md-offset-1" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div>') ?>

      <label for="cpf" class="col-sm-3 col-form-label">CPF</label>
      <div class="col-sm-8">
        <input type="number" class="form-control" onchange="close('#cpf')"
        id="cpf" name="cpf" placeholder="CPF"
        value="<?= set_value('cpf', isset($associate->cpf) ? $associate->cpf:''); ?>" />
      </div>
    </div>

    <div class="form-group row">
      <label for="id_city" class="col-sm-3 col-form-label">Cidade</label>
      <div class="col-sm-6">
        <select required class="form-control" name="id_city" id="id_city">
            <?php foreach ($cidades as $cidade) { ?>
            <option value="<?= $cidade['id_city'] ?>">
                <?= $cidade['name_city'] ?>
            </option>
            <?php } ?>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label for="street" class="col-sm-3 col-form-label">Rua</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="street" name="street" placeholder="Rua" value="<?= set_value('street', isset($associate->street) ? $associate->street:''); ?>">
      </div>
    </div>

    <div class="form-group row">
      <label for="number" class="col-sm-3 col-form-label">Número</label>
      <div class="col-sm-6">
        <input type="number" class="form-control" id="number" name="number" placeholder="Número" value="<?= set_value('number', isset($associate->number) ? $associate->number:''); ?>">
      </div>
    </div>

    <div class="form-group row">
      <label for="neighborhood" class="col-sm-3 col-form-label">Bairro</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="neighborhood" name="neighborhood" placeholder="Bairro" value="<?= set_value('neighborhood', isset($associate->neighborhood) ? $associate->neighborhood:''); ?>">
      </div>
    </div>

    <div class="form-group row">
      <?= form_error('id_frequency','<div class="row"><div class="alert alert-danger alert-dismissible col-md-8 col-md-offset-1" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div>') ?>

      <label for="id_frequency" class="col-sm-3 col-form-label">Frequência de Pagamento</label>
      <div class="col-sm-6">
        <select required class="form-control" name="id_frequency" id="id_frequency">
            <option value="">Selecione uma frequencia</option>
            <?php foreach ($frequencias as $frequencia) { ?>
            <option value="<?= $frequencia->id_frequency ?>">
                <?= $frequencia->frequency_description ?>
            </option>
            <?php } ?>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <?= form_error('duo_date','<div class="row"><div class="alert alert-danger alert-dismissible col-md-8 col-md-offset-1" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div>') ?>

      <label for="duo_date" class="col-sm-3 col-form-label">Data Venc. 1a Doação</label>
      <div class="col-sm-8">
        <input type="date" class="form-control"
        id="duo_date" name="duo_date"
        value="<?=date('Y-m-d', strtotime('+1 month'))?>"
        required />
      </div>
    </div>

    <div class="form-group row">
      <?= form_error('value_frequency','<div class="row"><div class="alert alert-danger alert-dismissible col-md-8 col-md-offset-1" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div>') ?>

      <label for="value_frequency" class="col-sm-3 col-form-label">Valor de Doação</label>
      <div class="col-sm-8">
        <input type="text" class="form-control"
        id="value_frequency" name="value_frequency" placeholder="Valor"
        value="<?= set_value('value_frequency', isset($associate->value_frequency) ? $associate->value_frequency:''); ?>"
        required />
      </div>
    </div>


    <div class="form-group row">
      <?= form_error('id_payment_type','<div class="row"><div class="alert alert-danger alert-dismissible col-md-8 col-md-offset-1" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div>') ?>

      <label for="id_payment_type" class="col-sm-3 col-form-label">Tipo de Pagamento</label>
      <div class="col-sm-6">
        <select required class="form-control" name="id_payment_type" id="id_payment_type" >
            <option value="">Selecione um tipo</option>
            <?php foreach ($payment_types as $pay_type) { ?>
              <option value="<?= $pay_type->id_payment_type ?>">
                  <?= $pay_type->description_payment ?>
              </option>
            <?php } ?>
        </select>
      </div>
    </div>

    <div id="div_bank" class="hide">

      <div class="form-group row">
        <label for="name_in_card" class="col-sm-3 col-form-label">Nome no cartão</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="name_in_card" name="name_in_card" placeholder="Nome no Cartão" value="<?= set_value('name_in_card', isset($associate->name_in_card) ? $associate->name_in_card:''); ?>">
        </div>
      </div>

      <div class="form-group row">
        <label for="term_route" class="col-sm-3 col-form-label">Banco</label>
        <div class="col-sm-8">
          <select class="form-control" name="term_route" id="term_route">
              <option value="">Selecione um banco</option>
              <?php foreach ($banks as $bank) { ?>
              <option value="<?= $bank['term_bank_route']; ?>">
                  <?= $bank['name_bank']; ?>
              </option>
              <?php } ?>
          </select>
        </div>
      </div>


      <div class="form-group row">
        <label for="agency_number" class="col-sm-3 col-form-label">Número da Agência</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="agency_number" name="agency_number" placeholder="Número da Agencia" value="<?= set_value('agency_number', isset($associate->agency_number) ? $associate->agency_number:''); ?>">
        </div>
      </div>

      <div class="form-group row">
        <label for="account_number" class="col-sm-3 col-form-label">Número da Conta</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="account_number" name="account_number" placeholder="Número da Conta" value="<?= set_value('account_number', isset($associate->account_number) ? $associate->account_number:''); ?>">
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label" for="obs">Observações:</label>
      <div class="col-sm-8">
        <textarea class="form-control" name="obs" rows="5" id="obs"></textarea>
      </div>
  </div>
  </div>





<div class="row col-sm-4">
  <label class="lead">Contatos</label>
  <a data-toggle="modal" data-target="#contact_modal" class="label label-success" href="#"><span class="glyphicon glyphicon-plus"></span> Contato</a>
  <div id="contacts" class="well"></div>
</div>

<div class="pull-right">
  <a class="btn btn-info" href="#" onclick="history.back()"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>
  <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
</div>

</form>
</div>

</div>


<div class="modal fade" id="contact_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Novo contato</h4>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label for="contact_description" class="col-sm-2 col-form-label">Tipo</label>
          <div class="col-sm-6 form-group">
            <select class="form-control" name="contact_type" id="contact_type">
              <?php foreach($contact_types as $type): ?>
                <option value="<?= $type["id_contact_type"] ?>" data-name="<?= $type["description_contact_type"] ?>"><?= $type["description_contact_type"] ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="contact_description" class="col-sm-2 col-form-label">Descrição</label>
          <div class="col-sm-6">
            <input type="text"
            class="form-control"
            id="contact_description" name="contact_description"
            value=""
            placeholder="Descrição">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
        <button id="create_contact" type="button" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
      </div>
    </div>
  </div>
</div>
