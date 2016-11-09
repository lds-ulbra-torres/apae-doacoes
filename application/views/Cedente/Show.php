<div class="page-header">
    <h1>Informações de <?= $cedente['razao_social'] ?> -</h1>
</div>
<br>
<div class="well">
    <table class="table table-responsive">
        <tr>
            <th class="col-md-3">Razão Social:</th>
            <td><?= $cedente['razao_social'] ?></td>
        </tr>
        <tr>
            <th class="col-md-3">Codigo do Cedente:</th>
            <td><?= $cedente['cod_cedente'] ?></td>
        </tr>
        <tr>
            <th class="col-md-3">Numero da Agencia:</th>
            <td><?= $cedente['num_agencia'] ?></td>
        </tr>
        <tr>
            <th class="col-md-3">Numero da Operacao:</th>
            <td><?= $cedente['num_operacao'] ?></td>
        </tr>
        <tr>
            <th class="col-md-3">Numero da Conta Corrente:</th>
            <td><?= $cedente['num_conta_corrente'] ?></td>
        </tr>
        <tr>
            <th class="col-md-3">CNPJ:</th>
            <td><?= $cedente['cnpj'] ?></td>
        </tr>
        <tr>
            <th class="col-md-3">Cidade:</th>
            <td><?= $cedente['name_city'] ?></td>
        </tr>
    </table>
    <a class="btn btn-default" href="<?= site_url(''); ?>">Voltar</a>
</div>
