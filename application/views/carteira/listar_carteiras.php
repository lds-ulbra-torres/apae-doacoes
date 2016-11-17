<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<br>
<br>
<br>

    <div class="container">
        <div class="row">
            <h1>Carteiras Cadastradas</h1>
            <br>
            <br>
			<a href="carteiras/add" class="btn btn-success margin-button15">Nova Carteira</a>

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th class="text-center">Nome</th>
                        <th class="text-center">Numero Carteira</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>

                <?php
                    $x = 0;
	                foreach ($carteira as $carteiras){
		                echo'<tr>';
		                   echo '<td>' .$carteiras->nome_carteira. '</td>';
		                   echo '<td>' .$carteiras->nume_carteira. '</td>';

		                   echo '<td class="text-center">';
		                   		echo '<a href="Alterar-Carteira/'.$carteiras->id_carteira.'" title="Editar" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>';
		                   		echo '<a href="carteiras_controller/visualiza/'.$carteiras->id_carteira.'" title="Visualizar" class="btn btn-info"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>';
		                   		echo '<a href="Deleta-Carteira/'.$carteiras->id_carteira.'" title="Deletar" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>';
		                   echo '</td>';

		                echo'</tr>';
		                   $x++;
	                }
                ?>
            </table>

            <div class="row">
            	<div class="col-md-12">
            		Total de cadastros: <?php echo $x ?>
            	</div>
            </div>
        </div>
    </div>
