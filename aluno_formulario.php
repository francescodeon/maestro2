<?php

//Captura as variaveis
//$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
//$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$id = isset($_POST['id']) ? filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT) : filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$data_nascimento = filter_input(INPUT_POST, 'data_nascimento', FILTER_SANITIZE_STRING);
$responsavel = filter_input(INPUT_POST, 'responsavel', FILTER_SANITIZE_STRING);
$salvar = filter_input(INPUT_POST, 'salvar', FILTER_VALIDATE_INT);


if(!$id)
{
	//CRIAR

	if($salvar){
		//Salvo os dados no arquivo
		//Verificando o preenchimento
		if(!$nome){
			$mensagem['nome'] = 'Preencha o usuario';
		}elseif(!$endereco){
			$mensagem['endereco'] = 'Preencha o endereço';
		}elseif(!$cpf){
			$mensagem['cpf'] = 'Preencha o cpf';
		}elseif(!$email){
			$mensagem['email'] = 'Preencha o email';
		}elseif(!$data_nascimento){
			$mensagem['data_nascimento'] = 'Preencha a data de nascimento';
		}elseif(!$responsavel){
			$mensagem['responsavel'] = 'Preencha o campo do responsavél';
		}else{
				
				
			//Abrir Conexão
			$link = mysqli_connect('localhost','root','');
			$conexao = mysqli_select_db($link, 'maestro');

			//Faz o Uso
			//Inserindo os dados
			echo $sql = " insert into aluno
					(
					nome,
					endereco,
					cpf,
					email,
					data_nascimento,
					responsavel
					)
					values
					(
					'$nome',
					'$endereco',
					'$cpf',
					'$email',
					'$data_nascimento',
					'$responsavel'
					)";
			$resultado = mysqli_query($link, $sql);
				
			//Fechei a conexao
			mysqli_close($link);
 

				
				
			$mensagem['sucesso'] = 'Registro inserido. Você já pode edita-lo.';
				
			header('location: index.php?pagina=aluno&mensagem='.$mensagem['sucesso']);
				
		}

	}


}
else
{
	//EDITAR
	if($salvar){
		//Salvo os dados no arquivo
		//Verificando o preenchimento
		if(!$nome){
			$mensagem['nome'] = 'Preencha o usuario';
		}elseif(!$endereco){
			$mensagem['endereco'] = 'Preencha o endereço';
		}elseif(!$cpf){
			$mensagem['cpf'] = 'Preencha o cpf';
		}elseif(!$email){
			$mensagem['email'] = 'Preencha o email';
		}elseif(!$data_nascimento){
			$mensagem['data_nascimento'] = 'Preencha a data de nascimento';
		}elseif(!$responsavel){
			$mensagem['responsavel'] = 'Preencha o campo do responsavél';
		}else{

			//Abrir Conexão
			$link = mysqli_connect('localhost','root','');
			$conexao = mysqli_select_db($link, 'maestro');

			//Faz o Uso
			//Atualizando os dados
			$sql = "
			update aluno
			set
			nome= '$nome',
			endereco = '$endereco',
			cpf = '$cpf',
			email = '$email',
			data_nascimento = '$data_nascimento',
			responsavel = '$responsavel'
			
			where
			id = $id
			";
				
			$resultado = mysqli_query($link, $sql);
			//Fechei a conexao
			mysqli_close($link);

			$mensagem['sucesso'] = 'Registro Editado.';
			header('location: index.php?pagina=aluno&mensagem='.$mensagem['sucesso']);

		}

	}else{

		//Abrir Conexão
		$link = mysqli_connect('localhost','root','');
		$conexao = mysqli_select_db($link, 'maestro');

		//Faz o Uso
		//Buscar os dados
		$sql = "select id, nome, endereco, cpf, email, data_nascimento, responsavel from aluno where id = $id";

		$resultado = mysqli_query($link, $sql);

		$row = mysqli_fetch_row($resultado);

		$nome = $row[1];
		$endereco = $row[2];
		$cpf = $row[3];
		$email = $row[4];
		$data_nascimento = $row[5];
		$responsavel = $row[6];

		//Fechei a conexao
		mysqli_close($link);

	}
}
?>


<form method="post">
	
	<label>ID</label>
	<input type="text" name="id" value="<?php echo $id;?>" />
	<label>Nome</label>
	<input type="text" name="nome" value="<?php echo $nome;?>" />
	<span><?=(isset($mensagem['usuario'])) ? $mensagem['usuario'] : '';?></span>
	<br/>
	<label>Endereço</label>
	<input type="text" name="endereco" value="<?php echo $endereco;?>" />
	<span><?=(isset($mensagem['senha'])) ? $mensagem['senha'] : '';?></span>
	<br/>
	<label>CPF</label>
	<input type="text" name="cpf" value="<?php echo $cpf;?>" />
	<span><?=(isset($mensagem['senha'])) ? $mensagem['senha'] : '';?></span>
	<br/>
	<label>E-Mail</label>
	<input type="text" name="email" value="<?php echo $email;?>" />
	<span><?=(isset($mensagem['senha'])) ? $mensagem['senha'] : '';?></span>
	<br/>
	<label>Nascimento</label>
	<input type="text" name="data_nascimento" value="<?php echo $data_nascimento;?>" />
	<span><?=(isset($mensagem['senha'])) ? $mensagem['senha'] : '';?></span>
	<br/>
	<label>Responsavel</label>
	<input type="text" name="responsavel" value="<?php echo $responsavel;?>" />
	<span><?=(isset($mensagem['senha'])) ? $mensagem['senha'] : '';?></span>
	<br/>
	
	<button type="submit" name="salvar" value="1" class="btn btn-success">Salvar</button>
	
</form>