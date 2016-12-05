<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<meta name="description" content="APAE Project">
	<meta name="keywords" content="apae,amor,paz,lds">
	<meta name="author" content="LDS Ulbra Torres">
	<title>APAE</title>
	<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
	<script src="<?= base_url('assets/js/jquery-3.1.1.min.js') ?>"></script>
	<script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
</head>
<body>
	<?php require_once('layout/navbar.php') ?>
	<div class="container" id="contents">
		<?= $contents ?>
	</div>
</body>
</html>
