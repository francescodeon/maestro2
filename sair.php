<?php $sair= filter_input(INPUT_POST, 'sair', FILTER_VALIDATE_INT);?>
<?php if($sair == 1){?>
	<?php session_destroy();?>
	<?php header ('location:login.php');?>
<?php } ?>
<div class="row ">
<h1>Sair</h1>
<ol class="breadcrumb">
<li><a href="index.php?pagina=dashboard">Maestro</a></li>
<li><a href="index.php?pagina=sair">Sair</a></li>
</ol>
</div>
<div>
<form action="index.php?pagina=sair" method="post">
<h2>Você deseja realmente sair ?</h2>
	<button type="submit" class="btn btn-default btn-danger " name="sair" value="1">Sim</button>
	<a href="index.php?pagina=dashboard" class="btn btn-success">Não</a>
</form>
</div>