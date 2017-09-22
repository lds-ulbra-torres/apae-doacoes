<script src="<?= base_url('assets/js/partner/partner.js') ?>" charset="utf-8"></script>

<div class="well well-lg container">
  <div class="page-header">
    <h2>Alterar Parceiro <strong><?=$partner['owner_name_partner']?></strong></h2>
  </div>
  <div class="row col-sm-12">
    <form method="POST" action="<?= base_url('partner/update'); ?>" enctype="multipart/form-data">
      <div class="row col-sm-8">

        <div class="form-group row">
          <?= form_error('fantasy_name_partner','<div class="row"><div class="alert alert-danger alert-dismissible col-md-8 col-md-offset-1" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div>') ?>

          <div class="row">
            <div class="col-sm-3">
              <label for="fantasy_name_partner" class="col-sm-12 col-form-label">Imagem da Empresa</label>
            </div>
            <div class="col-sm-7 form-group">
              <input type="file" class="file col-sm-12"
              id="photo_partner" name="photo_partner"
              placeholder="Nome da empresa"/>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label for="id_partner" class="col-sm-3 col-form-label">ID</label>
          <div class="col-sm-8">
            <input type="number" readonly
            class="form-control"
            id="id_partner" name="id_partner"
            value="<?= set_value('id_partner', isset($partner['id_partner']) ? $partner['id_partner']:''); ?>">
          </div>
        </div>

        <div class="form-group row">
          <?= form_error('fantasy_name_partner','<div class="row"><div class="alert alert-danger alert-dismissible col-md-8 col-md-offset-1" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div>') ?>

          <label for="fantasy_name_partner" class="col-sm-3 col-form-label">Nome da Empresa</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" onchange="close('#uuidError')"
            id="fantasy_name_partner" name="fantasy_name_partner"
            value="<?= set_value('fantasy_name_partner', isset($partner['fantasy_name_partner']) ? $partner['fantasy_name_partner']:''); ?>"
            placeholder="Nome da Empresa"
            required />
          </div>
        </div>

        <div class="form-group row">
          <?= form_error('owner_name_partner','<div class="row"><div class="alert alert-danger alert-dismissible col-md-8 col-md-offset-1" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div>') ?>

          <label for="owner_name_partner" class="col-sm-3 col-form-label">Nome do Proprietário</label>
          <div class="col-sm-8">
            <input type="text"
            class="form-control"
            onchange="close('#nameError')"
            id="owner_name_partner" name="owner_name_partner"
            value="<?= set_value('owner_name_partner', isset($partner['owner_name_partner']) ? $partner['owner_name_partner']:''); ?>"
            placeholder="Nome do Proprietário">
          </div>
        </div>


        <div class="form-group row">
          <?= form_error('rg_inscription_partner','<div class="row"><div class="alert alert-danger alert-dismissible col-md-8 col-md-offset-1" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div>') ?>

          <label for="rg_inscription_partner" class="col-sm-3 col-form-label">Inscrição Estadual/RG</label>
          <div class="col-sm-8">
            <input type="number"
            class="form-control"
            id="rg_inscription_partner" name="rg_inscription_partner"
            placeholder="Inscrição Estadual/RG"
            onchange="close('#rg_inscription_partnerError')"
            value="<?= set_value('rg_inscription_partner', isset($partner['rg_inscription_partner']) ? $partner['rg_inscription_partner']:''); ?>">
          </div>
        </div>

        <div class="form-group row">
          <?= form_error('cnpj_cpf_partner','<div class="row"><div class="alert alert-danger alert-dismissible col-md-8 col-md-offset-1" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div>') ?>

          <label for="cnpj_cpf_partner" class="col-sm-3 col-form-label">CNPJ/CPF</label>
          <div class="col-sm-8">
            <input type="number"
            class="form-control"
            onchange="close('#cnpj_cpf_partner')"
            id="cnpj_cpf_partner" name="cnpj_cpf_partner"
            placeholder="CNPJ/CPF"
            value="<?= set_value('cnpj_cpf_partner', isset($partner['cnpj_cpf_partner']) ? $partner['cnpj_cpf_partner']:''); ?>">
          </div>

        </div>

        <div class="form-group row">
          <label for="id_city" class="col-sm-3 col-form-label">Cidade</label>
          <div class="col-sm-8">
            <select required class="form-control" name="id_city" id="id_city">
              <option value="">Selecione</option>
              <?php foreach ($cidades as $cidade) { ?>
              <option value="<?= $cidade->id_city ?>" <?= $partner['id_city'] == $cidade->id_city ? 'selected' : '' ?>>
                <?= $cidade->name_city ?>
              </option>
              <?php } ?>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label for="cep_partner" class="col-sm-3 col-form-label">CEP</label>
          <div class="col-sm-8">
            <input type="text" class="form-control"
            id="cep_partner" name="cep_partner"
            value="<?= set_value('cep_partner', isset($partner['cep_partner']) ? $partner['cep_partner']:''); ?>"
            placeholder="CEP" />
          </div>
        </div>

        <div class="form-group row">
          <label for="street_partner" class="col-sm-3 col-form-label">Rua</label>
          <div class="col-sm-8">
            <input type="text" class="form-control"
            id="street_partner" name="street_partner"
            placeholder="Nome da Rua"
            value="<?= set_value('street_partner', isset($partner['street_partner']) ? $partner['street_partner']:''); ?>">
          </div>
        </div>

        <div class="form-group row">
          <label for="number_partner" class="col-sm-3 col-form-label">Número</label>
          <div class="col-sm-8">
            <input type="number_partner"
            class="form-control"
            id="number_partner" name="number_partner"
            placeholder="Número da Residência"
            value="<?= set_value('number_partner', isset($partner['number_partner']) ? $partner['number_partner']:''); ?>">
          </div>
        </div>

        <div class="form-group row">
          <label for="neighborhood_partner" class="col-sm-3 col-form-label">Bairro</label>
          <div class="col-sm-8">
            <input type="text"
            class="form-control"
            id="neighborhood_partner" name="neighborhood_partner"
            placeholder="Bairro"
            value="<?= set_value('neighborhood_partner', isset($partner['neighborhood_partner']) ? $partner['neighborhood_partner']:''); ?>">
          </div>
        </div>

        <div class="form-group row">
          <?= form_error('commercial_phone_partner','<div class="row"><div class="alert alert-danger alert-dismissible col-md-8 col-md-offset-1" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div>') ?>

          <label for="commercial_phone_partner" class="col-sm-3 col-form-label">Telefone Comercial</label>
          <div class="col-sm-8">
            <input type="number"
            class="form-control"
            id="commercial_phone_partner" name="commercial_phone_partner"
            placeholder="Telefone"
            value="<?= set_value('commercial_phone_partner', isset($partner['commercial_phone_partner']) ? $partner['commercial_phone_partner']:''); ?>">
          </div>
        </div>

        <div class="form-group row">
          <?= form_error('discount_partner','<div class="row"><div class="alert alert-danger alert-dismissible col-md-8 col-md-offset-1" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div>') ?>

          <label for="discount_partner" class="col-sm-3 col-form-label">Valor de Desconto (%)</label>
          <div class="col-sm-8">
            <input type="number"
            class="form-control"
            id="discount_partner" name="discount_partner"
            placeholder="Valor de desconto"
            value="<?= set_value('discount_partner', isset($partner['discount_partner']) ? $partner['discount_partner']:''); ?>">
          </div>
        </div>

        <div>
          <a class="btn btn-info" href="#" onclick="history.back()"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>
          <button  type="submit" id="create_partner" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
        </div>

      </div>
      
      <div class="row">
        <div class="full-center">
          <img id="partner_image" src="<?= isset($partner['photo_partner']) ? base_url($partner['photo_partner']):'http://www.filecluster.com/howto/wp-content/uploads/2014/07/User-Default.jpg'; ?>" width=250 height=>
        </div>
      </div>

    </form>
  </div>
</div>

