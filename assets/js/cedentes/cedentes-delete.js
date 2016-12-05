	$(document).ready(function(){
        /**
            * @author Caciano - 15-10-2016 - Pega o id do cadastro que quer deletar apartir do click do botao de delete
            * @return - abre o modal com o id
            */
            var idCedente;
            $("table").on("click",".deleteCedente", function(){
            	$('#deleteCedente').modal();
            	idCedente = $(this).attr("id");
            });

                /**
            * @author Caciano - 15-10-2016 - Envia o id do cadastro que quer deletar apartir do click do botao de delete para o controller
            * @return - mensagem de sucesso ou erro da ação do sistema
            */
            $("#delete-button").on("click", function(){
            	$.ajax({
            		url: "CedenteController/delete/" + idCedente,
            		type: "POST",
            		data: {id_cedente: idCedente},
            		success: function(data){
					//Se o controller nao conseguir deletar o cadastro retorna uma mensagem
					if(!data){
						alert(data);
					}else{
                        window.location.reload();
                    }
                },
                error: function(data){
									$('.toast').text("Erro de violação de integridade de dados!").fadeIn(400).delay(3000).fadeOut(400);
                }
            });
            });
        });
