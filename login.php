<?php

session_start();
$usuario= filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
$senha= filter_input(INPUT_POST , 'senha', FILTER_SANITIZE_STRING);
$msg='';

if(!$usuario){
	$msg='Informe um Usuário';
}elseif(!$senha){
	$msg='Informe uma Senha';
}else{
	$link = mysqli_connect('localhost','root','','maestro');
	$query = "SELECT * FROM usuarios where usuario='$usuario' and senha ='$senha'";
	$handle = mysqli_query($link, $query);
		if($query)
		{
			$_SESSION['autenticado']=true;
			header('location: index.php?pagina=dashboard');
		}
	}
}
?>
<html>
	<head>
		<title>Autenticação</title>
	</head>
	<body>
		<p><?=$msg;?></p>
		<form method="post">
			<label>Usuário</label>
			<input type="text" name="usuario" value="<?=$usuario;?>"/>
			<label>Senha</label>
			<input type="password" name="senha"/>
			<button type="submit">Acessar</button>
		</form>	
	</body>
</html>
