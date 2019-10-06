<?php
	session_start();
	include('conexao.php');
	
	$sql = "select * from cliente";
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
		if($_SESSION['tipo'] == 1){
			
	?>
	<table class="table tableresponsive" width="500" border="1">
	<thead>
		<tr>
			<!-- th para negrito e centralizado -->
			<th width="200">ID</td>
			<th width="200">Nome</td>
			<th width="200">Telefone</td>
			<th width="200">Endereço</td>
			<th width="200">Editar Dados</td>
			<th width="200">Excluir</td>
		</tr>
		</thead>
	<?php
			while ($dados = mysql_fetch_array($resultado)) {
				echo "<tr>";
				?><td><?php echo $dados['idcliente']?></td><td><?php echo $dados['c_nome']?></td><td><?php echo $dados['c_telefone']?></td><td><?php echo $dados['c_rua']?></td><td><a href="ceditar.php?id=<?php echo $dados['idcliente']?>">Editar</a></td><td><a href="cexcluir.php?id=
				<?php echo$dados['idcliente']?>" onclick='return confirm("Deseja EXCLUIR esse cliente?")'>Excluir</a></td>
				<?php echo "</tr>";
			}
		} else {
			echo "<script>
				alert('Por favor efetue login como administrador!');
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
		