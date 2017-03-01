<?php
$id=filter_input(INPUT_POST, 'id',FILTER_VALIDATE_INT);
$nome=filter_input(INPUT_POST, 'nome',FILTER_SANITIZE_STRING);
$email=filter_input(INPUT_POST, 'email',FILTER_SANITIZE_STRING);

if(!$id)
{
	$mensagem='Informe o id';
	header("location:/maestro/index.php?msg=$mensagem&pagina=aluno&formulario=0&id=$id");
}elseif(!$nome)
{
	$mensagem='Informe o nome';
	header("location:/maestro/index.php?msg=$mensagem&pagina=aluno&formulario=0&id=$id");
}elseif(!$email)
{
	$mensagem='Informe o email';
	header("location:/maestro/index.php?msg=$mensagem&pagina=aluno&formulario=0&id=$id");
}else{

	$buffer=array();

	$ponteiroArquivo=fopen('arquivo_aluno.txt','r');
	while (!feof($ponteiroArquivo) )
	{
		$linha= fgets($ponteiroArquivo, 1024);
		$linhaAtual = explode(';',$linha);
		if($linhaAtual[0]!=$id)
		{
			$buffer[]=$linha;
		}else{
			$buffer[]="$id;$nome;$email";
		}
	}
	fclose($ponteiroArquivo);

	$ponteiroArquivo1 =fopen('arquivo_aluno.txt','w');
	foreach ($buffer as $linha1)
	{
		fwrite($ponteiroArquivo1,$linha1);
	}
	fclose($ponteiroArquivo1);

	$mensagem='Edição realizada com sucesso ';
	header("location:/maestro/index.php?msg=$mensagem&pagina=aluno&formulario=0&id=$id");
}