<div id="content" style="">
<div>
	<h3 align="right" >Banco do Brasil</h3>
</div>

<div style="width:600px;">
	<div style="display: flex;justify-content: center;">
		<div style="width:200px">
			<p><b>Agência</b></p>
			<p><?= $associated->agency_number ?></p>
		</div>
		<div style="width:200px">
			<p><b>Conta corrente</b></p>
			<p><?= $associated->account_number  ?></p>
		</div>
		<div style="width:200px">
			<p><b>Telefone para contato DDD n°</b></p>
		</div>
	</div>

	<p><b>Nome</b></p>
	<p><?= $associated->name_associate ?></p>
	<p align="center"></p>
</div>


<p><b>Natureza de debito - assinale com  "X" as opcoes desejadas</b></p>
<div style="width:900px;" align="center">
   <!--
		<div  style="display: flex;justify-content: center;">
			<p style="padding-right:40px;border-right:solid 1px;border-bottom:solid 1px;">N° Identificador</p>
			<p style="padding-right:40px;padding-left:40px;border-right:solid 1px;border-bottom:solid 1px;">Nome da empresa</p>
			<p style="padding-left:40px;border-bottom:solid 1px;">N° convenio (uso BB)</p>
		</div>
		<div>
			<p>Outros</p>
			<p></p>
		</div>
	-->
		<table>
			<thead>
				<tr>
					<th></th>
					<td style="border-right:solid 1px;border-bottom:solid 1px;padding-left:40px;padding-right:40px;">Nº Identificador</td>
					<td style="border-right:solid 1px;border-bottom:solid 1px;padding-left:40px;padding-right:40px;">Nome da empresa</td>
					<td style="border-bottom:solid 1px;padding-left:40px;padding-right:40px;">Nº convenio</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td  style="border-bottom:solid 1px;border-right:solid 1px;">Agua</td>
					<td style="border-bottom:solid 1px;border-right:solid 1px;"></td>
					<td style="border-bottom:solid 1px;border-right:solid 1px;"></td>
					<td style="border-bottom:solid 1px;"></td>
				</tr>
				<tr>
					<td  style="border-bottom:solid 1px;border-right:solid 1px;">Energia elétrica</td>
					<td style="border-bottom:solid 1px;border-right:solid 1px;"></td>
					<td style="border-bottom:solid 1px;border-right:solid 1px;"></td>
					<td style="border-bottom:solid 1px;"></td>
				</tr>
				<tr>
					<td  style="border-bottom:solid 1px;border-right:solid 1px;">Telefone</td>
					<td style="border-bottom:solid 1px;border-right:solid 1px;"></td>
					<td style="border-bottom:solid 1px;border-right:solid 1px;"></td>
					<td style="border-bottom:solid 1px;"></td>
				</tr>
				<tr>
					<td  style="border-bottom:solid 1px;border-right:solid 1px;">Gás</td>
					<td style="border-bottom:solid 1px;border-right:solid 1px;"></td>
					<td style="border-bottom:solid 1px;border-right:solid 1px;"></td>
					<td style="border-bottom:solid 1px;"></td>
				</tr>
				<tr>
					<td style="border-bottom:solid 1px;border-right:solid 1px;">Outros:__________________</td>
					<td style="border-bottom:solid 1px;border-right:solid 1px;"></td>
					<td style="border-bottom:solid 1px;border-right:solid 1px;"></td>
					<td style="border-bottom:solid 1px;"></td>
				</tr>
			</tbody>
		</table>

</div>
<br>
<div style="width:900px">
	<h4 align="left"><b>Condições</b></h4>
	<p align="left" >1. Autorizo o Banco do Brasil S.A. a debitar em minha conta corrente o valor correspondente à quitação dos compromossos acima especificados.<br>
		2. Comprometo-me, desde ja, a manter saldo suficiente para o referido debito, ficando o banco do Brasil S.A. isento de qualquer responsabilidade decorrente da nao liquidacao do compromisso por insuficiencia de saldo na data do vencimento.<br>
		3. Estou ciente de que, caso conste na conta de sonsumo a espressao "Debito em conta - nao receber no caixa", esta podera ser quitada em qualquer terminal de auto-atendimento BB. Neste caso, devo procurar a minha agencia para esclarecimentos.<br>
		4. Em caso de duvida ou reclamacao sobre datas de vencimento e/ou valores, devo solicitar esclarecimentos diretamente a empresa credora.<br>
		5. Estou ciente de que o Banco do Brasil S.A. se reserva o direito de, a qualquer tempo, cancelar a presente prestacao de serviço, mediante comunicação por escrito.<br>
		6. Estou ciente de que, a autorizacao de debito pode ser cancelada por solicitacao da empresa convenente ou por mim, nos canias disponibilizados pelo Banco do Brasil S.A. (TAA, Internet, CABB) e agencias do BB.</p>
	</div>

	<main style="width:900px;display: flex;justify-content: center;">
		<div style="width:450px;">
			<p>Local e data</p>
			<p>_______________________________________________</p>
		</div>
		<div style="width:450px;">
			<p>Assinatura</p>
			<p>_______________________________________________</p>
		</div>
	</main>



	<div  style="border: 1px solid black;width:900px;">
		<p>O BANCO coloca a desposicao dos(s) cliente(s), os seguintes telefones: Central de atendimento - 4004.0001*, 0800.729.0001 ou (PJ) 0800.979.0909; Servico de Atendimento ao Consumidor (informacao, duvida, sugestao, elogio, reclamacao, suspensao ou cancelamento) - 0800.729.0722;
			Para Deficientes Auditivos ou de Fala - 0800.729.0088;
			Ouvidoria BB (demandas nao solucionadas no atendimento habitual) - 0800.729.5678.
			*Custos de ligacoes locais e impostos sera cobrados conforme o Estado de origem. No caso de ligacao via celular, custos da ligacao mais impostos conforme a operadora.</p>
		</div>
	</div>
