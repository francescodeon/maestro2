<?php 
$id=filter_input(INPUT_POST, 'id',FILTER_VALIDATE_INT);
$nome=filter_input(INPUT_POST, 'nome',FILTER_SANITIZE_STRING);
$email=filter_input(INPUT_POST, 'email',FILTER_SANITIZE_STRING);

if(!$id)
{
	$mensagem='Informe o id';
	header("location:/maestro/index.php?msg=$mensagem&pagina=aluno&formulario=1");	
}elseif(!$nome)
{
	$mensagem='Informe o nome';
	header("location:/maestro/index.php?msg=$mensagem&pagina=aluno&formulario=1");
}elseif(!$email)
{
	$mensagem='Informe o email';
	header("location:/maestro/index.php?msg=$mensagem&pagina=aluno&formulario=1");
}else{
	//var_dump($id);
	//var_dump($nome);
	//var_dump($email);
	$arquivo= array();
	$fd= fopen("arquivo_aluno.txt", "a");
	fwrite($fd, "\n$id;$nome;$email");
	fclose($fd);
	
	$mensagem='Cadastro Realizado com Sucesso ';
	header("location:/maestro/index.php?msg=$mensagem&pagina=aluno&formulario=0");
}

/*if($id!=null && $nome!=null && $email!=null){

	if (trim($id)=='' or !is_int($id))
	{
		$mensagem='Informe o id';
		header("location:/maestro/aluno_lista.php?msg=$mensagem&menu=aluno&formulario=1");
	}
	elseif(trim($nome)=='' or !is_string($nome))
	{
		$mensagem='Informe o nome';
		header("location:/maestro/aluno_lista.php?msg=$mensagem&menu=aluno&formulario=1");
	}
	elseif(trim($email)=='' or !is_string($email))
	{
		$mensagem='Informe o email';
		header("location:/maestro/aluno_lista.php?msg=$mensagem&menu=aluno&formulario=1");
	}else{
		
		//Arqmazenar em um arquivo
	}
	
}else{
	$mensagem='Informe os dados';
	header("location:/maestro/aluno_lista.php?msg=$mensagem&menu=aluno&formulario=1");
}
?>
*/
