<div align="center">
	<img src="apae.jpg" alt="" align="right-align">
</div>

<?php var_dump($associated) ?>
<p align="center"><i>"Inclusao se conquista com autonomia"</i></p><br>
<h1 align="center">Autorização de debito em conta corrente</h1>

<h2 align="center">Banco Banrisul</h2><br>

<p>Eu <?= $associated->name_associate ?>,CPF N°<?= $associated->cpf ?>, AUTORIZO a associacao de pais e amigos dos Excepesionais  de Torres a debitar automaticamente, na conta corrente n° $account_number, Agencia n° <?= $associated->agency_number ?>, de minha titularidade, o valor de R$ <?= $associated->value_frequency ?>, referente a doacao que faco espontaneamente a esta instituicao.</p>
<p align="center">Este debito devera ser realizado:</p>
<p align="center"><?= $frequency['frequency_description'] ?></p>

<br><br>

<p align="center">Torres,  de de 20.</p><br><br><br><br><br>
<p align="center">Assinatura</p><br><br><br><br><br>

<p align="center">ASSOCIACAO DE PAIS E AMIGOS DOS EXCEPCIONAIS DE TORRES</p>
<p align="center">Fundacao em 17/11/1997 - CNPF n° 89.227.243/0001-70</p>
<p align="center">Avenida do Riacho, 207 - Centro - Torres RS - Brasil - CEP 95.560-000</p>
<p align="center">Fone/fax: (51) 3664.2533 - E-mail: apaedetorres@gmail.com</p>
