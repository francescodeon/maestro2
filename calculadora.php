<?php 
$valor=filter_input(INPUT_GET, 'valor',FILTER_SANITIZE_STRING);
$operador=filter_input(INPUT_GET, 'valor',FILTER_SANITIZE_STRING);

$resultado=filter_input(INPUT_GET, 'resultado',FILTER_VALIDATE_INT);

$calculo = filter_input(INPUT_GET, 'calculo',FILTER_SANITIZE_STRING);

if($resultado)
$resultado = (float)("$calculo $operador $valor"); 	


print_r($resultado);
?>
<html>
	<head>
		<link rel="stylesheet" href="./css/bootstrap.css" />
		<link rel="stylesheet" href="./css/style2.css" />
		<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
		<script src="./js/bootstrap.js"></script>
		<title>Calculadora</title>
	</head>
	<body>
	<form method="get">
		<table  id="calculadora" border="1">
			<tr><td colspan="4"><p>Calculadora</p></td>
			<tr><td colspan="4"><input type="text" name="calculo" value="<?php echo $calculo;?>"/></td>
			<tr>
				<td><button type="submit" name="valor" value="7">7</button></td>  	
				<td><button type="submit" name="valor" value="8">8</button></td>
				<td><button type="submit" name="valor" value="9">9</button></td>
				<td><button type="submit" name="operador" value="-">-</button></td>
			</tr>
			<tr>
				<td><button type="submit" name="valor" >4</button></td>
				<td><button type="submit" name="valor">5</button></td>
				<td><button type="submit" name="valor">6</button></td>
				<td><button type="submit" name="operador">+</button></td>
			</tr>
			<tr>
				<td><button type="submit" name="valor">1</button></td>
				<td><button type="submit" name="valor">2</button></td>
				<td><button type="submit" name="valor">3</button></td>
				<td><button type="submit" name="operador">*</button></td>
			</tr>
			<tr>
				<td><button type="submit" name="valor">0</button></td>
				<td><button type="submit" name="valor">.</button></td>
				<td><button type="submit" name="operador">/</button></td>
				<td><button type="submit" name="resultado" value="1">=</button></td>
			</tr>
		
		
		</table>
	</form>
	
	
	
	
	
	</body>