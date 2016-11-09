<script src="<?= base_url('assets/js/cedentes/cedentes-delete.js') ?>"></script>
<div class="page-header">
    <h1>Cadastro de Cedentes -</h1>
</div>
<a href="<?= site_url('cedentes/add') ?>" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Cadastrar
    Cedente</a>
    <br>
    <br>
    <div class="well">
        <table id="tCedente" class="table table-resposive">
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
                            <a class="btn btn-default" href="<?= site_url('cedentes/show') . "/" . $cedente['id_cedente'] ?>">
                                <span class="glyphicon glyphicon-eye-open"></span>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="<?= site_url('cedentes/edit') . "/" . $cedente['id_cedente'] ?>">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                        </td>
                        <td>
                            <a class="deleteCedente btn btn-danger" id="<?= $cedente['id_cedente']; ?>" href="#">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div id="deleteCedente" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Apagar</h4>
                    </div>
                    <div class="modal-body">
                        <p>Deseja realmente apagar o cadastro?</p>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" onclick="return false" data-dismiss="modal">Cancelar</button>
                        <a href="#!" id="delete-button" data-dismiss="modal" class=" btn btn-danger">Apagar</a>
                    </div>
                </div>

            </div>
        </div>
