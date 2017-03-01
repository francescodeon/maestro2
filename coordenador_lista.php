<div class="row ">
	<h1>Coordenadores</h1>
	<ol class="breadcrumb">
		<li><a href="index.php?pagina=dashboard">Maestro</a></li>
		<li><a href="index.php?pagina=coordenador&formulario=0">Coordenadores</a></li>
	</ol>
</div>

<?php if(isset ( $_GET ['formulario'] ) && $_GET['formulario'] == 0) { ?>
	<div class="row">
		<a href="index.php?pagina=aluno&formulario=1"
			class="btn btn-success">Adicionar</a>
		<table class="table table-striped table-bordered  table-hover">
			<tr>
				<td>ID</td>
				<td>Usuario</td>
				<td>Funções</td>
			</tr>
			<tr>
				<td>123</td>
				<td>Juares</td>
				<td><a href="#" class="btn btn-default btn-info">Editar</a> <a
					href="#" class="btn btn-default btn-danger">Deletar</a></td>
			</tr>
			<tr>
				<td>123</td>
				<td>Juares</td>
				<td><a href="#" class="btn btn-default btn-info">Editar</a> <a
					href="#" class="btn btn-default btn-danger">Deletar</a></td>
			</tr>
			<tr>
				<td>123</td>
				<td>Juares</td>
				<td><a href="#" class="btn btn-default btn-info">Editar</a> <a
					href="#" class="btn btn-default btn-danger">Deletar</a></td>
			</tr>
		</table>
	</div>
<?php }else{ ?>
	<form method="post">
		<h1>Formulário</h1>
		<label for="id" class="labelform">ID</label> <input name="id" id="id"
			type="text" class="inputform" /> <label for="nome" class="labelform">Nome</label>
		<input name="nome" type="text" id="nome" class="inputform" /> <label
			for="email" class="labelform">E-Mail</label> <input name="email"
			type="text" id="email" class="inputform" /> <input type="submit"
			value="Salvar" />
	
	</form>
<?php }		?>