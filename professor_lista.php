			<div class="row ">
				<h1>Professores</h1>
				<ol class="breadcrumb">
					<li><a href="index.php?pagina=dashboard">Maestro</a></li>
					<li><a href="index.php?pagina=professor&formulario=0">Professores</a></li>
				</ol>
			</div>
			<?php if(isset ( $_GET ['formulario'] ) && $_GET['formulario'] == 0) {?>
			<div class="row">
			<?php $ponteiroArquivo= fopen('arquivo_professor.txt','r');?>
				<a href="index.php?pagina=professor&formulario=2" class="btn btn-success">Adicionar</a>
				<?php $msg= filter_input(INPUT_GET, 'msg', FILTER_SANITIZE_STRING);?>
				<?php if($msg){echo $msg;}?>
				<table class="table table-striped table-bordered  table-hover">
					<tr>
						<td>ID</td>
						<td>Nome</td>
						<td>E-mail</td>
						<td>Unidade</td>
						<td>Disciplina</td>
						<td>Funções</td>
					</tr>
					<?php while(!feof($ponteiroArquivo)){?>
					<?php 	$row = fgets($ponteiroArquivo, 1024);?>
					<?php	$dados= explode(';',$row);?>
					<tr>
						<td><?=$dados[0];?></td>
						<td><?=$dados[1];?></td>
						<td><?=$dados[2];?></td>
						<td><?=$dados[3];?></td>
						<td><?=$dados[4];?></td>
						<td>					
							<a href="index.php?pagina=professor&formulario=2&id=<?=$dados[0];?>" class="btn btn-default btn-info">Editar</a> 
							<a href="professor_deleta.php?id=<?=$dados[0];?>" class="btn btn-default btn-danger">Deletar </a>
						</td>				
					</tr>
					<?php }?>
				</table>
			</div>
			<?php }else{ ?>
			
			<?=(isset($_GET['msg']))?$_GET['msg']:'';?> 
			<?php $id= filter_input(INPUT_GET, 'id' ,FILTER_VALIDATE_INT);?> 
						
						<?php if($id)
						{
							$ponteiroArquivo = fopen('arquivo_professor.txt', 'r');
							
							while(!feof($ponteiroArquivo))
							{
								$linha =fgets($ponteiroArquivo, 1024);
								$dados = explode(';',$linha);
								if($dados[0]==$id)
								{
									$registro=$dados;
								}
							}
							
						}
					
					
					?>
						<form method="post" action="<?=($id) ? 'professor_editar.php':'professor_adiciona.php';?>">
								<h1>Formulário</h1>
								<label for="id" class="labelform">ID</label>
								<input name="id" id="id" type="text"class="inputform"  value="<?=isset($registro[0])? $registro[0]: ' ';?>"/>
								<label for="nome"class="labelform">Nome</label>
								<input name ="nome" type="text" id="nome" class="inputform" value="<?=isset($registro[1])? $registro[1]: ' ';?>" />
								<label for="email" class="labelform">E-Mail</label>
								<input name="email" type="text" id="email"class="inputform" value="<?=isset($registro[2])? $registro[2]: ' ';?>" />
								<label for="unidade" class="labelform">Unidade</label>
								<input name="unidade" type="text" id="unidade"class="inputform"  value="<?=isset($registro[3])? $registro[3]: ' ';?>"/>
								<label for="disciplina" class="labelform">Discilpina</label>
								<input name="disciplina" type="text" id="disciplina"class="inputform" value="<?=isset($registro[4])? $registro[4]: ' ';?>" />
								<input type="submit"value="Salvar"/>
			
						</form>
			<?php }