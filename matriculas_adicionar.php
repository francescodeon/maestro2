<?php
$link = mysqli_connect('localhost','root','','maestro');

$sql = "
		SELECT 
			matricula.id,
			matricula.id_aluno,
			aluno.nome as nomealuno,
			cursos.curso as nomecurso
		FROM matricula
		JOIN aluno ON (matricula.id_aluno = aluno.id)
		JOIN cursos ON (matricula.id_curso = cursos.id)
	   ";

$resultado = mysqli_query($link, $sql);
if(mysqli_num_rows($resultado)){
	while($row = mysqli_fetch_assoc($resultado)){
		echo 'CODIGO MATRICULA: '. $row['id']."</br> \n";
		echo 'NOME ALUNO:'.$row['nomealuno']."</br> \n";
		echo 'NOME CURSO:'.$row['nomecurso']."</br> \n";

		
	}
}