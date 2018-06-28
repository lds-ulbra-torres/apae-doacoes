<script src="<?= base_url('assets/js/partner/partner.js') ?>" charset="utf-8"></script>
<div class="well well-lg container">
	<div class="page-header">
		<h2>Cadastro de Novo Parceiro</h2>
	</div>
	<div class="row col-sm-12">
		<form method="POST" action="<?= base_url('partner/create'); ?>" id="create_partner" enctype="multipart/form-data">
			<div class="row col-sm-8">
				
				<div class="form-group row">
					<label for="neighborhood_partner" class="col-sm-3 col-form-label">Categoria</label>
					<div class="col-sm-8">
						<select required	 class="form-control" name="category_id_category" id="category_id_category" >
							<option value="">Selecione uma Categoria</option>
							<?php foreach ($categories as $category) { ?>
								<option value="<?= $category->id_category ?>">
									<?= $category->name_category ?>
								</option>
							<?php } ?>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<?= form_error('fantasy_name_partner','<div class="row"><div class="alert alert-danger alert-dismissible col-md-8 col-md-offset-1" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div>') ?>
					<label for="fantasy_name_partner" class="col-sm-3 col-form-label">Nome da Empresa</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" onchange="close('#fantasyNamePartner')"
						id="fantasy_name_partner" name="fantasy_name_partner"
						value="<?= set_value('fantasy_name_partner', isset($partner->fantasy_name_partner) ? $partner->fantasy_name_partner:''); ?>"
						placeholder="Nome da empresa"
						required />
					</div>
				</div>


				
				<div class="form-group row">
					<?= form_error('owner_name_partner','<div class="row"><div class="alert alert-danger alert-dismissible col-md-8 col-md-offset-1" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div>') ?>
					<label for="owner_name_partner" class="col-sm-3 col-form-label">Nome do Proprietário</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" onchange="close('#ownerNamePartnerError')"
						id="owner_name_partner" name="owner_name_partner"
						value="<?= set_value('owner_name_partner', isset($partner->owner_name_partner) ? $partner->owner_name_partner:''); ?>"
						placeholder="Nome do proprietário"
						required />
					</div>
				</div>

				
				<div class="form-group row">
					<?= form_error('rg_inscription_partner','<div class="row"><div class="alert alert-danger alert-dismissible col-md-8 col-md-offset-1" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div>') ?>
					<label for="rg_inscription_partner" class="col-sm-3 col-form-label">Inscrição Estadual/RG</label>
					<div class="col-sm-8">
						<input type="number" class="form-control"
						id="rg_inscription_partner" name="rg_inscription_partner" placeholder="Rg ou inscrição estadual" onchange="close('#rgInscriptionPartnerError')"
						value="<?= set_value('rg_inscription_partner', isset($partner->rg_inscription_partner) ? $partner->rg_inscription_partner:''); ?>"/>
					</div>
				</div>

				<div class="form-group row">
					<?= form_error('cnpj_cpf_partner','<div class="row"><div class="alert alert-danger alert-dismissible col-md-8 col-md-offset-1" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div>') ?>
					<label for="cnpj_cpf_partner" class="col-sm-3 col-form-label">CNPJ/CPF</label>
					<div class="col-sm-8">
						<input required	 type="number" class="form-control" onchange="close('#cpfCnpjError')"
						id="cnpj_cpf_partner" name="cnpj_cpf_partner" placeholder="CPF/CNPJ"
						value="<?= set_value('cnpj_cpf_partner', isset($partner->cnpj_cpf_partner) ? $partner->cnpj_cpf_partner:''); ?>"/>
					</div>
				</div>

				<div class="form-group row">
					<label for="commercial_phone_partner" class="col-sm-3 col-form-label">Telefone Comercial</label>
					<div class="col-sm-8">
						<input type="text" class="form-control"
						id="commercial_phone_partner" name="commercial_phone_partner" placeholder="Telefone"
						value="<?= set_value('commercial_phone_partner', isset($partner->commercial_phone_partner) ? $partner->commercial_phone_partner:''); ?>">
					</div>
				</div>

				<div class="form-group row">
					<label for="commercial_phone_partner" class="col-sm-3 col-form-label">Desconto à vista</label>
					<div class="col-sm-8">
						<input required type="number" class="form-control"
						id="discount_partner" name="discount_partner" placeholder="Porcentagem de desconto à vista"
						value="<?= set_value('discount_partner', isset($partner->discount_partner) ? $partner->discount_partner:''); ?>">
					</div>
				</div>

				<div class="form-group row">
					<label for="commercial_phone_partner" class="col-sm-3 col-form-label">Desconto à prazo</label>
					<div class="col-sm-8">
						<input required type="number" class="form-control"
						id="term_discount_partner" name="term_discount_partner" placeholder="Porcentagem de desconto à prazo"
						value="<?= set_value('term_discount_partner', isset($partner->term_discount_partner) ? $partner->term_discount_partner:''); ?>">
					</div>
				</div>
				
				<div class="form-group row">
					<label for="commercial_phone_partner" class="col-sm-3 col-form-label">Desconto no cartão de débito</label>
					<div class="col-sm-8">
						<input required type="number" class="form-control"
						id="card_discount_partner" name="card_discount_partner" placeholder="Porcentagem de desconto no cartão de débito"
						value="<?= set_value('card_discount_partner', isset($partner->card_discount_partner) ? $partner->card_discount_partner:''); ?>">
					</div>
				</div>

				<div class="form-group row">
					<label for="id_city" class="col-sm-3 col-form-label">Cidade</label>
					<div class="col-sm-8">
						<select required class="form-control" name="id_city" id="id_city">
							<option value = "">Selecione</option>
							<?php foreach ($cidades as $cidade) { ?>
							<option value="<?= $cidade->id_city ?>">
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
						id="cep_partner" name="cep_partner" placeholder="Cep"
						value="<?= set_value('cep_partner', isset($partner->cep_partner) ? $partner->cep_partner:''); ?>">
					</div>
				</div>

				<div class="form-group row">
					<label for="street_partner" class="col-sm-3 col-form-label">Rua</label>
					<div class="col-sm-8">
						<input type="text" class="form-control"
						id="street_partner" name="street_partner"
						placeholder="Nome da Rua"
						value="<?= set_value('street_partner', isset($partner->street_partner) ? $partner->street_partner:''); ?>">
					</div>
				</div>

				<div class="form-group row">
					<label for="number" class="col-sm-3 col-form-label">Número</label>
					<div class="col-sm-8">
						<input type="number" class="form-control"
						id="number_partner" name="number_partner"
						placeholder="Número da Residência"
						value="<?= set_value('number_partner', isset($partner->number_partner) ? $partner->number_partner:''); ?>">
					</div>
				</div>

				<div class="form-group row">
					<label for="neighborhood_partner" class="col-sm-3 col-form-label">Bairro</label>
					<div class="col-sm-8">
						<input type="text" class="form-control"
						id="neighborhood_partner" name="neighborhood_partner"
						placeholder="Bairro"
						value="<?= set_value('neighborhood_partner', isset($partner->neighborhood_partner) ? $partner->neighborhood_partner:''); ?>">
						<br>
						<div >
							<a class="btn btn-info" href="#" onclick="history.back()"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>
							<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
						</div>
					</div>
				</div>
				            
			</div>

			<div class="row">
					<div class="full-center">
						<img id="partner_image" src="http://www.filecluster.com/howto/wp-content/uploads/2014/07/User-Default.jpg" width=250 height=>
					</div>
					<div class="form-group row">
						<?= form_error('fantasy_name_partner','<div class="row"><div class="alert alert-danger alert-dismissible col-md-8 col-md-offset-1" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div>') ?>
						<div class="row">
						<div class="col-sm-4">
							<label for="fantasy_name_partner" class="col-sm-12 col-form-label">Imagem da Empresa</label>
							<div class=" form-group">
							<input type="file" class="file col-sm-12"
							id="photo_partner" name="photo_partner"
							placeholder="Nome da empresa"/>
							</div>
						</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>

</div>
