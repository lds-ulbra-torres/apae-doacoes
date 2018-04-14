<script src="<?= base_url('assets/js/category/category.js') ?>" charset="utf-8"></script>
<div class="well well-lg">
    <div class="page-header">
      <h2>Cadastro de Categoria</h2>
    </div>
    <div class="row">
      <form action="<?= site_url('category/create'); ?>" method="post" class="form-group" enctype="multipart/form-data">
        <div class="col-sm-12 col-md-8">
            <div class="form-horizontal">
              <div class="form-group row">
                  <label class="col-sm-3 col-form-label" for="nome_categoria">Nome</label>
                  <div class="col-sm-8">
                    <input placeholder="Nome da Categoria..." id="nome_categoria" type="text" class="form-control" name="name_category"
                  required>
                  </div>
              </div>

              <div class="form-group row">
                  <label class="col-sm-3 col-form-label" for="descricao_categoria">Descrição</label>
                  <div class="col-sm-8">
                    <input placeholder="Descrição..." id="descricao_categoria" type="text" class="form-control" name="description_category">
                  </div>
              </div>
			</div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="row">
                <img id="category_image" src="http://www.filecluster.com/howto/wp-content/uploads/2014/07/User-Default.jpg" width=250 height=>
                <div class="form-group row">
                    <?= form_error('fantasy_name_partner','<div class="row"><div class="alert alert-danger alert-dismissible col-md-8 col-md-offset-1" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div>') ?>
                    <div class="row">
                        <label for="fantasy_name_partner" class="col-sm-12 col-form-label">Imagem da Empresa</label>
                        <div class=" form-group">
                            <input type="file" class="file col-sm-12"
                            id="photo_category" name="photo_category"
                            placeholder="Nome da empresa"/>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>  
            <div class="form-group">
                  <a class="btn btn-default" href="<?= site_url('category'); ?>"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>
                  <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
            </div>
          </div>

      </form>
    </div>
</div>
