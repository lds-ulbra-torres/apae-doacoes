<div class="well">
  <div class="page-header">
    <h4>Alterar Categoria</h4>
  </div>
  <form action="<?= site_url('category/update') . '/' . $category[0]['id_category']; ?>" method="post">
      <input type="hidden" value="<?= $category[0]['id_category'] ?>" name="category[id_category]">
      <div class="form-horizontal">

          <div class="form-group">
              <label for="nameType">Nome</label>
              <input placeholder="Nome da Frequência..." value="<?= $category[0]['name_category'] ?>"
                     type="text"
                     class="form-control" name="category[name_category]" required>
          </div>

          <div class="form-group">
              <label>Descrição</label>
              <input placeholder="Parcelas..." value="<?= $category[0]['description_category'] ?>" type="text" class="form-control" name="category[description_category]">
          </div>

          <div class="form-group">
            <a class="btn btn-default" href="<?= site_url('category'); ?>"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>
            <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
          </div>
      </div>
  </form>
</div>
