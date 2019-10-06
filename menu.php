<?php
	include('conexao.php');
	session_start();
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Menu na vertical</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<style>
body {
background: url(imagens/01.jpg)no-repeat center fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
} 
</style>
</head>

<body bgcolor="tan" text="black">
<?php
		if(isset($_SESSION['tipo'])){ //Teste para saber se existe alguem logado.
			if($_SESSION['tipo'] == 1){ //Teste para saber se a conta de administrador
	?>
<font face="monotype corsiva" size="5" color="cornflowerl">

	<ul id="nav" >
		<li><a href="#" target="alvo">Home</a></li>
		<li><a href="cadastrarpedido.php" target="alvo">Cadastrar Pedido</a></li>
		<li><a href="concliente.php" target="alvo">Consultar Clientes</a></li>
		<li><a href="#" target="alvo">Produto</a>
		<ul>
			<li><a href="conproduto.php" target="alvo">Consultar Produtos</a></li>
			<li><a href="cadproduto.php" target="alvo">Cadastrar Produto</a></li>
		</ul>
		<li><a href="#"> Funcionário</a>
			<ul>
				<li><a href="confuncionario.php" target="alvo">Consultar Funcionario</a></li>
				<li><a href="cadfuncionario.php" target="alvo">Cadastrar Funcionario</a></li>
			</ul>
		</li>
		<li><a href="#">Ajuda</a></li>
	</ul>
</font>
<?php 
		} else {
		if($_SESSION['tipo'] == 2){
?>
<font face="monotype corsiva" size="5" color="cornflowerl">

	<ul id="nav" >
		
		<li><a href="#" target="alvo">Home</a></li>
		<li><a href="cadastrarpedido.php" target="alvo">Cadastrar Pedido</a></li>
		<li><a href="conproduto.php" target="alvo">Consultar Produtos</a>
		<li><a href="#">Ajuda</a>
		
	</ul>
</font>
<?php 
		} else { 
				echo "<script>
				alert('Por favor Efetue o Login !');
				location.href='login.php';
			  </script>";
		}
		}
		}
?>
</body>
</html>