<?php
$id=filter_input(INPUT_GET, 'id' , FILTER_VALIDATE_INT);

if($id)
{
	$buffer=array();

	$ponteiroArquivo=fopen('arquivo_professor.txt','r');
	while (!feof($ponteiroArquivo) )
	{
		$linha= fgets($ponteiroArquivo, 1024);
		$linhaAtual = explode(';',$linha);
		if($linhaAtual[0]!=$id)
		{
			$buffer[]=$linha;
		}
	}
	fclose($ponteiroArquivo);

	$ponteiroArquivo1 =fopen('arquivo_professor.txt','w');
	foreach ($buffer as $linha1)
	{
		fwrite($ponteiroArquivo1,$linha1);
	}
	fclose($ponteiroArquivo1);

	$mensagem='Exclusão realizada com sucesso ';
	header("location:/maestro/index.php?msg=$mensagem&pagina=professor&formulario=0");

}else{
	$mensagem='Informe um id para deletar';
	header("location:/maestro/index.php?msg=$mensagem&pagina=professor&formulario=0");
}