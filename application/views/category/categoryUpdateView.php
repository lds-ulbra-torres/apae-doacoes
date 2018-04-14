<script src="<?= base_url('assets/js/category/category.js') ?>" charset="utf-8"></script>
<div class="well">
  <div class="page-header">
    <h4>Alterar Categoria</h4>
  </div>
  <form action="<?= site_url('category/update') . '/' . set_value('id_category', isset($category[0]['id_category']) ? $category[0]['id_category']:''); ?>" method="post" enctype="multipart/form-data">    
          <input type="hidden" value="<?=set_value('id_category', isset($category[0]['id_category']) ? $category[0]['id_category']:'');?>" name="id_category">
            <div class="col-sm-12 col-md-8">
                <div class="form-horizontal">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="nome_categoria">Nome</label>
                    <div class="col-sm-8">
                        <input placeholder="Nome da Categoria..." id="nome_categoria" type="text" class="form-control" name="name_category"
                        value="<?=set_value('name_category', isset($category[0]['name_category']) ? $category[0]['name_category']:''); ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="descricao_categoria">Descrição</label>
                    <div class="col-sm-8">
                        <input placeholder="Descrição..." id="descricao_categoria" type="text" class="form-control" name="description_category"
                        value="<?= set_value('description_category', isset($category[0]['description_category']) ? $category[0]['description_category']:'');?>">

                    </div>
                </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="row">
                    <img id="category_image" src=src="<?= isset($category[0]['photo_category']) ? base_url($category[0]['photo_category']):'http://www.filecluster.com/howto/wp-content/uploads/2014/07/User-Default.jpg'; ?>" width=250 height=> 
                    <div class="form-group row">
                        <?= form_error('fantasy_name_partner','<div class="row"><div class="alert alert-danger alert-dismissible col-md-8 col-md-offset-1" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div>') ?>
                        <div class="row">
                            <label for="fantasy_name_partner" class="col-sm-12 col-form-label">Imagem da Empresa</label>
                            <div class=" form-group">
                                <input type="file" class="file col-sm-12"
                                id="photo_category" name="photo_category"
                                placeholder="Nome da empresa" value="<?= set_value('photo_category', isset($category[0]['photo_category']) ? $category[0]['photo_category']:'');?>"/>
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
  </form>
</div>
        