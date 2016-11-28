<script src="<?= base_url('assets/js/associated/associated.js') ?>" charset="utf-8"></script>

<div class="well well-lg container">
  <div class="page-header">
    <h2><?= $title ?></h2>
  </div>
  <div class="row col-sm-12">
    <form method="POST" action="<?= base_url('associated/update'); ?>">


      <div class="col-sm-8">
        <div class="form-group row">
          <label for="id_associate" class="col-sm-3 col-form-label">ID</label>
          <div class="col-sm-8">
            <input type="number" readonly
            class="form-control"
            id="id_associate" name="id_associate"
            value="<?= set_value('id_associate', isset($associate->id_associate) ? $associate->id_associate:''); ?>">
          </div>
        </div>

        <div class="form-group row">
          <div id="validation_errors" class="container row">
            <?= form_error('name_associate','<div id="error_name_associate" class="error col-sm-4 alert-warning alert-dismissible" role="alert">', '</div>') ?>
          </div>
          <label for="name_associate" class="col-sm-3 col-form-label">Nome</label>
          <div class="col-sm-8">
            <input type="text"
            class="form-control"
            onchange="close('#nameError')"
            id="name_associate" name="name_associate"
            value="<?= set_value('name_associate', isset($associate->name_associate) ? $associate->name_associate:''); ?>"
            placeholder="Nome Associado">
          </div>
        </div>

        <div class="form-group row">
          <label for="street" class="col-sm-3 col-form-label">Prazo</label>
          <div class="col-sm-8">
            <input type="date"
            class="form-control"
            id="due_date" name="due_date"
            value="<?= date('Y-m-d', strtotime("+1 year")); ?>">
          </div>
        </div>

        <div class="form-group row">
         <div id="validation_errors" class="container row">
           <?= form_error('birth_date','<div id="error_birth_date" class="col-sm-4 alert-warning alert-dismissible" role="alert">', '</div>') ?>
         </div>
         <label for="birth_date" class="col-sm-3 col-form-label">Aniversário</label>
         <div class="col-sm-8">
          <input type="date"
          class="form-control"
          onchange="close('#birthError')"
          id="birth_date" name="birth_date"
          value="<?= set_value('birth_date', isset($associate->birth_date) ? $associate->birth_date:''); ?>">
        </div>
      </div>

      <div class="form-group row">
       <div id="validation_errors" class="container row">
        <?= form_error('rg','<div id="error_rg" class="col-sm-4 alert-warning alert-dismissible" role="alert">', '</div>') ?>
      </div>
      <label for="rg" class="col-sm-3 col-form-label">RG</label>
      <div class="col-sm-8">
        <input type="number"
        class="form-control"
        id="rg" name="rg"
        placeholder="RG"
        onchange="close('#rgError')"
        value="<?= set_value('rg', isset($associate->rg) ? $associate->rg:''); ?>">
      </div>
    </div>

    <div class="form-group row">
       <div id="validation_errors" class="container row">
       <?= form_error('cpf','<div id="error_cpf" class="col-sm-4 alert-warning alert-dismissible" role="alert">', '</div>') ?>
      </div>
      <label for="cpf" class="col-sm-3 col-form-label">CPF</label>
      <div class="col-sm-8">
        <input type="number"
        class="form-control"
        onchange="close('#cpf')"
        id="cpf" name="cpf"
        placeholder="CPF"
        value="<?= set_value('cpf', isset($associate->cpf) ? $associate->cpf:''); ?>">
      </div>
    </div>

    <div class="form-group row">
      <label for="street" class="col-sm-3 col-form-label">Nome no cartão de associado</label>
      <div class="col-sm-8">
        <input type="text"
        class="form-control"
        id="name_in_card" name="name_in_card"
        placeholder="Rua"
        value="<?= set_value('name_in_card', isset($associate->name_in_card) ? $associate->name_in_card:''); ?>">
      </div>
    </div>

    <div class="form-group row">
      <label for="street" class="col-sm-3 col-form-label">Valor de contribuição</label>
      <div class="col-sm-8">
        <input type="text"
        class="form-control"
        id="value_frequency" name="value_frequency"
        placeholder="Valor"
        value="<?= set_value('value_frequency', isset($associate->value_frequency) ? $associate->value_frequency:''); ?>">
      </div>
    </div>


    <div class="form-group row">
      <label for="id_payment_type" class="col-sm-3 col-form-label">Tipo de Pagamento</label>
      <div class="col-sm-6">
        <select required class="form-control" name="id_payment_type" id="id_payment_type">
            <option value="">Selecione um tipo</option>
            <?php foreach ($payment_types as $pay_type) { ?>
            <option value="<?= $pay_type['id_payment_type']; ?>" <?= $associate->id_payment_type == $pay_type['id_payment_type'] ? 'selected' : '' ?>>
                <?= $pay_type['description_payment'] ?>
            </option>
            <?php } ?>
        </select>
      </div>
    </div>

    <div id="div_bank" class="hide">
      <div class="form-group row">
        <label for="street" class="col-sm-3 col-form-label">Nome do banco</label>
        <div class="col-sm-8">
          <input type="text"
          class="form-control"
          id="bank_name" name="bank_name"
          placeholder="Banco"
          value="<?= set_value('bank_name', isset($associate->bank_name) ? $associate->bank_name:''); ?>">
        </div>
      </div>

      <div class="form-group row">
        <label for="street" class="col-sm-3 col-form-label">Número da conta</label>
        <div class="col-sm-8">
          <input type="text"
          class="form-control"
          id="account_number" name="account_number"
          placeholder="Conta"
          value="<?= set_value('account_number', isset($associate->account_number) ? $associate->account_number:''); ?>">
        </div>
      </div>

      <div class="form-group row">
        <label for="street" class="col-sm-3 col-form-label">Número da agencia</label>
        <div class="col-sm-8">
          <input type="text"
          class="form-control"
          id="agency_number" name="agency_number"
          placeholder="Agencia"
          value="<?= set_value('agency_number', isset($associate->agency_number) ? $associate->agency_number:''); ?>">
        </div>
      </div>
    </div>


    <div class="form-group row">
      <label for="id_frequency" class="col-sm-3 col-form-label">Frequência de Pagamento</label>
      <div class="col-sm-6">
        <select required class="form-control" name="id_frequency" id="id_frequency">
            <option value="">Selecione uma frequência</option>
            <?php foreach ($frequencias as $frequencia) { ?>
            <option value="<?= $frequencia['id_frequency'] ?>">
                <?= $frequencia['frequency_description'] ?>
            </option>
            <?php } ?>
        </select>
      </div>
    </div>

  <div class="form-group row">
    <label for="id_city" class="col-sm-3 col-form-label">Cidade</label>
    <div class="col-sm-6">
      <select required class="form-control" name="id_city" id="id_city">
          <option value="">Selecione uma cidade</option>
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
      <input type="text"
      class="form-control"
      id="street" name="street"
      placeholder="Rua"
      value="<?= set_value('street', isset($associate->street) ? $associate->street:''); ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="number" class="col-sm-3 col-form-label">Número</label>
    <div class="col-sm-6">
      <input type="number"
      class="form-control"
      id="number" name="number"
      placeholder="Número"
      value="<?= set_value('number', isset($associate->number) ? $associate->number:''); ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="neighborhood" class="col-sm-3 col-form-label">Bairro</label>
    <div class="col-sm-8">
      <input type="text"
      class="form-control"
      id="neighborhood" name="neighborhood"
      placeholder="Bairro"
      value="<?= set_value('neighborhood', isset($associate->neighborhood) ? $associate->neighborhood:''); ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="id_city" class="col-sm-3 col-form-label">Cidade (comercial)</label>
    <div class="col-sm-6">
      <select class="form-control" name="work_id_city" id="work_id_city">
          <?php foreach ($cidades as $cidade) { ?>
          <option value="<?= $cidade['id_city'] ?>">
              <?= $cidade['name_city'] ?>
          </option>
          <?php } ?>
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="street" class="col-sm-3 col-form-label">Rua (comercial)</label>
    <div class="col-sm-8">
      <input type="text"
      class="form-control"
      id="work_street" name="work_street"
      placeholder="Rua "
      value="<?= set_value('work_street', isset($associate->work_street) ? $associate->work_street:''); ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="number" class="col-sm-3 col-form-label">Número (comercial)</label>
    <div class="col-sm-6">
      <input type="number"
      class="form-control"
      id="work_street_number" name="work_street_number"
      placeholder="Número"
      value="<?= set_value('work_street_number', isset($associate->work_street_number) ? $associate->work_street_number:''); ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="neighborhood" class="col-sm-3 col-form-label">Bairro (comercial)</label>
    <div class="col-sm-8">
      <input type="text"
      class="form-control"
      id="work_street_neighborhood" name="work_street_neighborhood"
      placeholder="Bairro"
      value="<?= set_value('work_street_neighborhood', isset($associate->work_street_neighborhood) ? $associate->work_street_neighborhood:''); ?>">
    </div>
  </div>

</div>

<div class="row col-sm-4">
  <label class="lead">Contatos</label>
  <a data-toggle="modal" data-target="#contact_modal" class="label label-success" href="#"><span class="glyphicon glyphicon-plus"></span> Contato</a>
  <div id="contacts" class="well">
    <?php foreach ($user_contacts as $contact) :?>
      <div class="contact"><button class="close" type="button"><span>&times;</span></button><input type="hidden" name="contact[]" value="<?= $contact['id_contact_type'];?>/<?= $contact['description_contact']; ?>"><strong><?= $contact['description_contact_type']; ?>: </strong><?= $contact['description_contact']; ?></div>
    <?php endforeach; ?>

  </div>
</div>

<div class="pull-right">
  <a class="btn btn-info" href="#" onclick="history.back()"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>
  <button  type="submit" id="create_associate" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
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
          <div class="col-sm-6">
            <select class="" name="contact_type" id="contact_type">
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
