<div class="row ">
			<h1>Matriculas</h1>
			<ol class="breadcrumb">
				<li><a href="index.php?pagina=dashboard">Maestro</a></li>
				<li><a href="index.php?pagina=matriculas">Matriculas</a></li>
			</ol>
		</div>
		
			<div class="row">
				<a href="index.php?pagina=matriculas_formulario" class="btn btn-success">Adicionar</a>
				
				<?php $msg = filter_input ( INPUT_GET, 'msg', FILTER_SANITIZE_STRING ); ?>
				<?php if ($msg) { echo $msg; } ?>
				
				<?php $link = mysqli_connect('localhost','root','','maestro');
					$sql = "SELECT	
							*
						FROM matriculas
						LEFT JOIN aluno ON (matriculas.id_aluno = aluno.id)
						LEFT JOIN cursos ON (matriculas.id_curso = cursos.id)
	   						";
					$resultado = mysqli_query($link, $sql);?>	
						

				<table class="table table-striped table-bordered  table-hover">
					<tr>
						<td>ID</td>
						<td>Aluno</td>
						<td>Curso</td>
						<td>Data de Matricula</td>
						<td>Status do Pagamento</td>
						<td>Funções</td>
					</tr>
					<?php while($row = mysqli_fetch_assoc($resultado)){?>
					<tr>
						<td><?php echo $row['id'];?></td>
						<td><?php echo $row['nome'];?></td>
						<td><?php echo $row['curso'];?></td>
						<td><?php echo $row['data_matricula'];?></td>
						<td><?php echo $row['status_pagamento'];?></td>
						<td>
							<a href="index.php?pagina=matriculas_formulario&id=<?php echo $row['id'];?>" class="btn btn-primary">Editar</a>
							<a href="index.php?pagina=matriculas_formulario&id=<?php echo $row['id'];?>"  class="btn btn-danger">Deletar</a>
						</td>
					</tr>
		<?php } ?>
				</table>
				<?php mysqli_close($link); ?>
			</div>