<?php

$id=filter_input(INPUT_POST, 'id',FILTER_VALIDATE_INT);
$nome=filter_input(INPUT_POST, 'nome',FILTER_SANITIZE_STRING);
$email=filter_input(INPUT_POST, 'email',FILTER_SANITIZE_STRING);
$unidade=filter_input(INPUT_POST, 'unidade',FILTER_SANITIZE_STRING);
$disciplina=filter_input(INPUT_POST, 'disciplina',FILTER_SANITIZE_STRING);

if(!$id)
{
	$mensagem='Informe o id';
	header("location:/maestro/index.php?msg=$mensagem&pagina=professor&formulario=2");
}elseif(!$nome)
{
	$mensagem='Informe o nome';
	header("location:/maestro/index.php?msg=$mensagem&pagina=professor&formulario=2");
}elseif(!$email)
{
	$mensagem='Informe o email';
	header("location:/maestro/index.php?msg=$mensagem&pagina=professor&formulario=2");
}elseif(!$email)
{
	$mensagem='Informe a unidade';
	header("location:/maestro/index.php?msg=$mensagem&pagina=professor&formulario=2");
}elseif(!$email)
{
	$mensagem='Informe a disciplina';
	header("location:/maestro/index.php?msg=$mensagem&pagina=professor&formulario=2");

}else{
	//var_dump($id);
	//var_dump($nome);
	//var_dump($email);
	$arquivo= array();
	$fd= fopen("arquivo_professor.txt", "a");
	fwrite($fd, "\n$id;$nome;$email;$unidade;$disciplina");
	fclose($fd);

	$mensagem='Cadastro Realizado com Sucesso ';
	header("location:/maestro/index.php?msg=$mensagem&pagina=professor&formulario=0	");
}