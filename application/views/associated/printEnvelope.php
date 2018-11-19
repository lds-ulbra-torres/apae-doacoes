<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <html lang="pt-br">
	<title>APAE Doações</title>
	<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
	<script src="<?= base_url('assets/js/jquery-3.1.1.min.js') ?>"></script>
	<script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.mask.js')?>"></script>
    <link rel="stylesheet" href="<?= base_url('assets/css/printStyle.css') ?>">  

</head>
<body>    
    <div class="container noprint">
        <button class="noprint btn btn-lg btn-primary" onclick="imprimir()">Imprimir</button>
    </div>
    <div class="folha">
        <?php foreach ($print as $key => $value) { ?>
            <div class="envelope">
                <div class="centro">
                    <h1 class="info"><?= $value->name_associate?></h1>
                    <h1 class="info"><?= $value->street?>, <?= $value->number?> <?= $value->complement?></h1>
                    <h1 class="info"><?= $value->name_city?>-<?= $value->uf_state?> </h1>
                    <h1 class="info"><?= $value->cep?></h1>
                    <h1 class="info"><?= $value->neighborhood?></h1>
                </div>
            </div>
        <?php } ?>   
    </div>  
</body>
<script>
function imprimir() {
    window.print();
}
</script>
</html>