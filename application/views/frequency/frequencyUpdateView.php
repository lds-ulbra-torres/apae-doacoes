<div class="col-md-offset-2 col-md-8">
    <a href="<?= site_url('frequency'); ?>"> << Voltar</a>
<h4>Editar Frequência - </h4>
<form action="<?= site_url('frequency/update') . '/' . $frequency[0]['id_frequency']; ?>" method="post" class="form-group">
    <input type="hidden" value="<?= $frequency[0]['id_frequency'] ?>" name="frequency[id_frequency]">
    <div class=" row">
        <div class="form-group col-md-offset-2 col-md-7">
            <label for="nameType">Tipo da frequencia:</label>
            <input placeholder="Tipo da frequencia  .." value="<?= $frequency[0]['frequency_description'] ?>"
                   type="text"
                   class="form-control" name="frequency[frequency_description]" required>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-offset-2 col-md-8">
                    <button class="btn btn-success" type="submit">Enviar</button>
        </div>
    </div>
</form>
</div>
