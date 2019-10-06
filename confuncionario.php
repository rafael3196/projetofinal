<?php
	session_start();
	include('conexao.php');
	
	$sql = "select * from funcionario";
	$resultado = mysql_query($sql, $conexao);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<title>Consultar Funcionários</title>
	<link rel="stylesheet" type="text/css" href="css/confun.css"/>
	<script type="text/javascript" src="_javascript/javascript.js"></script>
</head>
<body>
	<?php
	if(isset($_SESSION['tipo'])){
		if($_SESSION['tipo'] == 1){ //Parte do Gerente
	?>
	<table class="table tableresponsive" width="500" border="1">
	<thead>
		<tr>
			<!-- th para negrito e centralizado -->
			<th width="200">ID</td>
			<th width="200">Nome</td>
			<th width="200">Data de Nascimento</td>
			<th width="200">CPF</td>
			<th width="200">Login</td>
			<th width="200">Editar Dados</td>
		</tr>
		</thead>
	<?php
			while ($dados = mysql_fetch_array($resultado)) {
				echo "<tr>";
				echo "<td>".$dados['idfuncionario']."</td><td>".$dados['f_nome']."</td><td>".$dados['dtnasc']."</td><td>".$dados['cpf']."</td><td>".$dados['login']."</td><td><a href=feditar.php?id=".$dados['idfuncionario'].">Editar</a></td>";
				echo "</tr>";
			}
		} else { //caso tenha alguem logado mas não seja um administrador
			echo "<script>
				alert('Por favor efetue o login como administrador!');
				location.href='index.php';
			  </script>";
		}
	} else {
		// caso não tenha ninguém logado.
		echo "<script>
				alert('Por favor efetue o login!');
				location.href='index.php';
			  </script>";
	}
	?>
</body>
</html>
