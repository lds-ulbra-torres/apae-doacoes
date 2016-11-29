<div class="well">
  <div class="page-header">
    <h4>Alterar Frequência</h4>
  </div>
  <form action="<?= site_url('frequency/update') . '/' . $frequency[0]['id_frequency']; ?>" method="post">
      <input type="hidden" value="<?= $frequency[0]['id_frequency'] ?>" name="frequency[id_frequency]">
      <div class="form-horizontal">

          <div class="form-group">
              <label for="nameType">Nome</label>
              <input placeholder="Nome da Frequência..." value="<?= $frequency[0]['frequency_description'] ?>"
                     type="text"
                     class="form-control" name="frequency[frequency_description]" required>
          </div>

          <div class="form-group">
              <label>Quantidade de Parcelas</label>
              <input placeholder="Parcelas..." value="<?= $frequency[0]['frequency_count'] ?>" type="number" class="form-control" name="frequency[frequency_count]"
              required>
          </div>

          <div class="form-group">
            <a class="btn btn-default" href="<?= site_url('frequency'); ?>"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>
            <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
          </div>
      </div>
  </form>
</div>
