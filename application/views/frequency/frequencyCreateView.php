<div class="col-md-offset-2 col-md-8">
    <a href="<?= site_url('frequency'); ?>"> << Voltar</a>
    <h4>Nova Frequências - </h4>
    <div class="col-md-12">
    <form action="<?= site_url('frequency/create'); ?>" method="post" class="form-group">
        <div class="row">
            <div class="form-group col-md-offset-2 col-md-8">
                <label>Tipo da frequencia:</label>
                <input placeholder="Tipo da frequencia  .." type="text" class="form-control" name="frequency[frequency_description]"
                required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-offset-2 col-md-8">
                <button class="btn btn-success" type="submit">Enviar</button>
            </div>
        </div>
    </form>
    </div>
</div>
