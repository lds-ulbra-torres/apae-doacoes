<div class="well well-lg">
    <div class="page-header">
      <h2>Cadastro de Frequência</h2>
    </div>
    <div class="">
      <form action="<?= site_url('frequency/create'); ?>" method="post" class="form-group">
          <div class="form-horizontal">
              <div class="form-group">
                  <label>Tipo da frequencia:</label>
                  <input placeholder="Tipo da frequência.." type="text" class="form-control" name="frequency[frequency_description]"
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
