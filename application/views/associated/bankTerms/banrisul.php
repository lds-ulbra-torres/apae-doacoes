<div align="center">
	<img src="<?=site_url('assets/img/logo_apae.png')?>" alt="" class="">
</div>
<p align="center"><i>"Inclusao se conquista com autonomia"</i></p><br>
<h1 align="center">Autorização de debito em conta corrente</h1>

<h2 align="center">Banco Banrisul</h2><br>

<p>Eu, <strong><?= $associated->name_associate ?></strong>, portador(a) do RG <strong><?=$associated->rg?></strong>, inscrito(a) no CPF n° <strong><?= $associated->cpf?></strong>, AUTORIZO a Associação de Pais e Amigos dos Excepcionais  de Torres a debitar automaticamente, na Conta Corrente n° <strong><?=$associated->account_number?></strong>, Agencia n° <strong><?= $associated->agency_number ?></strong> de minha titularidade, o valor de <strong>R$ <?=number_format($associated->value_frequency, 2)?></strong> reais, referente a doação que faço espontaneamente a essa instituição.</p>
<p align="center">Este débito deverá ser realizado:</p>
<p align="center"><strong><?=$frequency['frequency_description'] .' ('. $frequency['frequency_count'] .'x)' ?></strong></p>

<br><br>

<p align="center">Torres, ___ de __________ de 20___.</p><br><br><br><br><br>
<p align="center">_____________________________________</p>
<p align="center">Assinatura</p>
<br><br><br><br><br>

<p align="center"><strong>ASSOCIAÇÃO DE PAIS E AMIGOS DOS EXCEPCIONAIS DE TORRES (APAE)</strong></p>
<p align="center">Fundação em 17/11/1997 - CNPF n° 89.227.243/0001-70</p>
<p align="center">Avenida do Riacho, 207 bairro Centro, Torres-RS, CEP 95.560-000</p>
<p align="center">Fone/fax: (51) 3664.2533 - E-mail: apaedetorres@gmail.com</p>
