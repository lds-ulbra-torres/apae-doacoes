<script src="<?= base_url('assets/js/cedentes/cedentes-delete.js') ?>"></script>
<div class="well well-lg">
  <div class="page-header">
      <h2>Cedentes</h2>
      <a href="<?= site_url('cedentes/add') ?>" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Cadastrar Cedente</a>
  </div>
  <table id="tCedente" class="table table-resposive table-hover">
      <thead>
          <tr>
              <th class="col-md-8 col-xs-9">Razão Social</th>
              <th class="col-md-2 col-xs-2">Cidade</th>
              <th class="">Ações</th>
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
                    <div class="btn-group">
                      <a role="button" class="btn btn-info" href="<?= site_url('cedentes/show') . "/" . $cedente['id_cedente'] ?>">
                          <span class="glyphicon glyphicon-eye-open"></span>
                      </a>
                      <a role="button" class="btn btn-primary" href="<?= site_url('cedentes/edit') . "/" . $cedente['id_cedente'] ?>">
                          <span class="glyphicon glyphicon-edit"></span>
                      </a>
                      <a role="button" class="deleteCedente btn btn-danger" id="<?= $cedente['id_cedente']; ?>" href="#">
                          <span class="glyphicon glyphicon-trash"></span>
                      </a>
                    </div>
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
