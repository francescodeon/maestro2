	<div class="row ">
			<h1>Alunos</h1>
			<ol class="breadcrumb">
				<li><a href="index.php?pagina=dashboard">Maestro</a></li>
				<li><a href="index.php?pagina=aluno&formulario=0">Alunos</a></li>
			</ol>
		</div>
		
			<div class="row">
				<a href="index.php?pagina=aluno_formulario" class="btn btn-success">Adicionar</a>
				
				<?php $msg = filter_input ( INPUT_GET, 'msg', FILTER_SANITIZE_STRING ); ?>
				<?php if ($msg) { echo $msg; } ?>
				
				
				<?php $link = mysqli_connect('localhost', 'root','', 'maestro');?> 
				<?php $query = 'SELECT * FROM aluno ORDER BY id ASC';?>
				<?php $handle = mysqli_query($link, $query);?>

				<table class="table table-striped table-bordered  table-hover">
					<tr>
						<td>ID</td>
						<td>Nome</td>
						<td>Enedereço</td>
						<td>CPF</td>
						<td>E-Mail</td>
						<td>Nascimento</td>
						<td>Rseponsavél</td>
						<td>Funções</td>
					</tr>
					<?php while($row = mysqli_fetch_assoc($handle)){ ?>
					<tr>
						<td><?php echo $row['id'];?></td>
						<td><?php echo $row['nome'];?></td>
						<td><?php echo $row['endereco'];?></td>
						<td><?php echo $row['cpf'];?></td>
						<td><?php echo $row['email'];?></td>
						<td><?php echo $row['data_nascimento'];?></td>
						<td><?php echo $row['responsavel'];?></td>
						<td>
							<a href="index.php?pagina=aluno_formulario&id=<?php echo $row['id'];?>" class="btn btn-primary">Editar</a>
							<a href="index.php?pagina=aluno_deletar&id=<?php echo $row['id'];?>"  class="btn btn-danger">Deletar</a>
						</td>
					</tr>
		<?php } ?>
				</table>
				<?php mysqli_close($link); ?>
			</div>