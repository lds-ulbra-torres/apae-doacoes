<?php
/**
 * Created by PhpStorm.
 * User: LeoSorgetz
 * Date: 01/11/2016
 * Time: 01:11
 */
//var_dump($cidades)
?>
<br>

<?php if (isset($error)) { ?>
<div class="panel panel-danger">
    <div class="panel-heading">Erro -</div>
    <div class="panel-body"><?= $error ?></div>
</div>
<?php
} ?>

<div class="well">
    <form action="<?= site_url('create') ?>" method="post" class="form-group">
        <div>
            <label>Codigo do Cedente:</label>
            <input type="number" class="form-control" name="cedente[cod_cedente]" placeholder="Codigo do Cedente.." required>
        </div>
        <br>
        <div>
            <label>Numero da agencia:</label>
            <input type="number" min="0" class="form-control" name="cedente[num_agencia]" placeholder="Numero da agencia.."
            required>
        </div>
        <br>
        <div>
            <label>Numero da operação:</label>
            <input type="number" class="form-control" name="cedente[num_operacao]" placeholder="Numero da operação.."
            required>
        </div>
        <br>
        <div>
            <label>Numero da conta corrente:</label>
            <input type="number" class="form-control" name="cedente[num_conta_corrente]"
            placeholder="Numero da conta corrente.." required>
        </div>
        <br>
        <div>
            <label>CNPJ:</label>
            <input type="number" class="form-control" name="cedente[cnpj]" placeholder="CNPJ.." required>
        </div>
        <br>
        <div>
            <label>Razão Social:</label>
            <input type="text" class="form-control" name="cedente[razao_social]" placeholder="Razão Social.." required>
        </div>
        <br>
        <div>
            <label>Cidade:</label>
            <select class="form-control" name="cedente[id_cidade]" required>
                <?php foreach ($cidades as $cidade) { ?>
                <option value="<?= $cidade['id_city'] ?>">
                    <?= $cidade['name_city'] ?>
                </option>
                <?php } ?>
            </select>
        </div>
        <br>
        <div>
            <button class="btn btn-success">Cadastrar</button>
            <a class="btn btn-default" href="<?= site_url('') ?>">Voltar</a>
        </div>
    </form>
</div>
