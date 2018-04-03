<div class="well well-lg">
    <div class="page-header">
      <h2>Cadastro de Categoria</h2>
    </div>
    <div class="">
      <form action="<?= site_url('category/create'); ?>" method="post" class="form-group">
          <div class="form-horizontal">

              <div class="form-group">
                  <label>Nome</label>
                  <input placeholder="Nome da Categoria..." type="text" class="form-control" name="category[name_category]"
                  required>
              </div>

              <div class="form-group">
                  <label>Descrição</label>
                  <input placeholder="Descrição..." type="text" class="form-control" name="category[description_category]">
              </div>
              <div class="form-group">
                  <a class="btn btn-default" href="<?= site_url('category'); ?>"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>
                  <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
              </div>
          </div>

      </form>
    </div>
</div>
