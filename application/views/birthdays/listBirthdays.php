<div class="well well-lg">
  <?= $this->session->flashdata('alert') ?>
  <div class="page-header">
    <h2>Aniversariantes do Mês</h2>

        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 no-padding-right">
                    <form method="GET" action="<?=base_url('birthdays/search')?>" class="form-inline">
                        <div class="input-group pull-right" >
                            <select name="month" class="dropdown form-control">
                                <?php foreach ($months as $i => $month) { ?>
                                    <option value="<?= $i ?>" <?= ($mesAtual==$i ? "selected" : "")?> ><?= $month ?></option>
                                <?php } ?>
                            </select>
                            <span  class="input-group-btn width-min" >
                                <button type="submit" class="btn btn-info">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <form action="<?= base_url('birthdays/createmessage')?>" method="POST">
        <button type="submit" class="btn btn-success" value="Submit">Enviar</button>
            <table class="table table-birthday table-responsive table-striped table-hover text-center">
                <thead>
                    <tr>
                        <th><input type="checkbox" name="checkAll" id="checkAll"'/> </th>
                        <th>Código Único</th>
                        <th>Nome</th>
                        <th>Data Nascimento</th>
                        <th></th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($birthdays as $birthday): ?>
                    <tr>
                        <td><input type="checkbox" name="checked[]" value="<?= $birthday->id_associate ?>">  </td>
                        <td><a href="<?=base_url('associated-detail/'. $birthday->id_associate)?>"><?= $birthday->uuid_associate ?></a></td>
                        <td><?= $birthday->name_associate ?></td>
                        <td><?= date_format(date_create($birthday->birth_date), 'd/m/Y')?></td>
                        <td><?php if($birthday->disable == 1){ echo '<span class="label label-danger">Inativo</span>'; } ?></td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-info btn-sm" href="<?= base_url('associated-detail/'. $birthday->id_associate) ?>"><span class="glyphicon glyphicon-eye-open"></span></a>
                                <a class="btn btn-primary btn-sm" href="<?= base_url('associated/edit/'. $birthday->id_associate) ?>"><span class="glyphicon glyphicon-edit"></span></a>
                                <a class="btn btn-warning btn-sm" href="<?= base_url('associated/'. $birthday->id_associate .'/collections') ?>"><span class="glyphicon glyphicon-usd"></span></a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <div class="row">
            <div class="col-md-12 text-center">
                <?= $pagination ?>
            </div>
        </div>
    </form>
</div>

<script src="<?= base_url('assets/js/birthdays/birthdays.js') ?>" charset="utf-8"></script>