<div class="well well-lg">
    <div class="page-header">
      <h2>Cadastro de Frequência</h2>
    </div>
    <div class="">
      <form action="<?= site_url('frequency/create'); ?>" method="post" class="form-group">
          <div class="form-horizontal">

              <div class="form-group">
                  <label>Nome</label>
                  <input placeholder="Nome da Frequência..." type="text" class="form-control" name="frequency[frequency_description]"
                  required>
              </div>

              <div class="form-group">
                  <label>Quantidade de Parcelas</label>
                  <input placeholder="Parcelas..." type="number" class="form-control" name="frequency[frequency_count]"
                  required>
              </div>
              <div class="form-group">
                  <a class="btn btn-default" href="<?= site_url('frequency'); ?>"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>
                  <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
              </div>
          </div>

      </form>
    </div>
</div>
