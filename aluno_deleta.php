<?php
//Abrir Conexão
$link = mysqli_connect('localhost','root','','maestro');


$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if($id){

	$query = "SELECT * FROM `aluno` WHERE `aluno`.`id` = $id";
	$result = mysqli_query($link, $query);

	if(mysqli_num_rows($result)){

		$delete = filter_input(INPUT_POST, 'delete', FILTER_VALIDATE_INT);
		if($delete){


			//Faz uso
			//Deletando o registro
			$query = "DELETE FROM `aluno` WHERE `aluno`.`id` = $id";
			mysqli_query($link, $query);

			mysqli_close($link);


			$mensagem['sucesso'] = 'Registro Apagado.';
			header('location: index.php?pagina=aluno&mensagem='.$mensagem['sucesso']);



		}

		?>
		
		
		<form method="post">
			<p> Você tem certeza que deseja excluir este registro? </p>
			
			<button name="delete" type="submit" value="1" class="btn btn-danger">Sim</button>
			<a href="index.php?pagina=aluno" class="btn btn-default">Não</a>
			
		</form>
	<?php }else{?>
		<p> Registro não encontrado</p>
		<a href="aluno_lista.php">Retornar para a Lista</a>
	<?php } ?>
	
<?php }else{ ?>
	<p> Informe um registro para avaliar a deleção.</p>
<?php } ?>