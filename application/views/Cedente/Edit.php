<?php
/**
 * Created by PhpStorm.
 * User: LeoSorgetz
 * Date: 01/11/2016
 * Time: 01:11
 */
//var_dump($cedente);
//var_dump($cidades);
?>
<div class="well">
  <div class="page-header">
      <h1>Alterar Cedente</h1>
  </div>
    <form action="<?= site_url('cedentes/update') ?>" method="post" class="form-group">
        <input type="hidden" name="cedente[id_cedente]" value="<?= $cedente[0]['id_cedente'] ?>">
        <div>
            <label>Codigo do Cedente:</label>
            <input type="text" class="form-control" value="<?= $cedente[0]['cod_cedente'] ?>"
                   name="cedente[cod_cedente]" placeholder="Codigo do Cedente.."
                   required>
        </div>
        <br>
        <div>
            <label>Numero da agencia:</label>
            <input type="text" class="form-control" value="<?= $cedente[0]['num_agencia'] ?>"
                   name="cedente[num_agencia]" placeholder="Numero da agencia.."
                   required>
        </div>
        <br>
        <div>
            <label>Numero da operação:</label>
            <input type="text" class="form-control" value="<?= $cedente[0]['num_operacao'] ?>"
                   name="cedente[num_operacao]" placeholder="Numero da operação.."
                   required>
        </div>
        <br>
        <div>
            <label>Numero da conta corrente:</label>
            <input type="text" class="form-control" name="cedente[num_conta_corrente]"
                   value="<?= $cedente[0]['num_conta_corrente'] ?>"
                   placeholder="Numero da conta corrente.." required>
        </div>
        <br>
        <div>
            <label>CNPJ:</label>
            <input type="text" class="form-control" value="<?= $cedente[0]['cnpj'] ?>" name="cedente[cnpj]"
                   placeholder="CNPJ.." required>
        </div>
        <br>
        <div>
            <label>Razão Social:</label>
            <input type="text" class="form-control" value="<?= $cedente[0]['razao_social'] ?>"
                   name="cedente[razao_social]" placeholder="Razão Social.." required>
        </div>
        <br>
        <div>
            <label>Banco:</label>
            <select class="form-control" name="cedente[id_bank]">
                <?php foreach ($bancos as $banco) { ?>
                  <option
                      value="<?= $banco['id_bank'] ?>"
                      <?php $banco['id_bank'] == $cedente[0]['id_bank'] ? print_r("selected") : print_r("") ?> >
                      <?= $banco['name_bank'] ?>
                  </option>
                <?php } ?>
            </select>
        </div>
        <br>
        <div>
            <label>Cidade:</label>
            <select class="form-control" name="cedente[id_cidade]" required>
                <?php foreach ($cidades as $cidade) { ?>
                    <option
                        value="<?= $cidade['id_city'] ?>"
                        <?php $cidade['id_city'] == $cedente[0]['id_cidade'] ? print_r("selected") : print_r("") ?> >
                        <?= $cidade['name_city'] ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <br>
        <div>
            <a class="btn btn-default" href="<?= site_url('cedentes') ?>"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>
            <button class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>

        </div>
    </form>
</div>
