<div class="page-header">
    <h1>Cadastro de Cedentes -</h1>
</div>
<a href="<?= site_url('add') ?>" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Cadastrar
    Cedente</a>
<br>
<br>
<div class="well">
    <table class="table table-hover">
        <thead>
        <tr>
            <th class="col-md-8 col-xs-9">Razão Social</th>
            <th class="col-md-2 col-xs-2">Cidade</th>
            <th class="col-md-1 col-xs-1" colspan="3">Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($cedentes as $cedente) {
            ?>
            <tr>
                <td><?= $cedente['razao_social'] ?></td>
                <td><?= $cedente['name_city'] ?></td>
                <td>
                    <a class="btn btn-default" href="<?= site_url('show') . "/" . $cedente['id_cedente'] ?>">
                        <span class="glyphicon glyphicon-eye-open"></span>
                    </a>
                </td>
                <td>
                    <a class="btn btn-primary" href="<?= site_url('edit') . "/" . $cedente['id_cedente'] ?>">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                </td>
                <td>
                    <a class="btn btn-danger" href="<?= site_url('delete' . "/" . $cedente['id_cedente']) ?>">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>