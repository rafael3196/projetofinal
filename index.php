<?php
	session_start();
	if(isset($_POST['btlogin'])){
		$login = $_POST['tlogin'];
		$senha = $_POST['tsenha'];
		$sql = "select * from funcionario where f_status=1 and login='$login' and senha='$senha'";
		$resultado = mysql_query($sql, $conexao);
		$registros = mysql_num_rows($resultado);
		if($registros==0) {
			echo "<script>
				alert('Login ou senha inválidos!')
				location.href='index.php';
			  </script>";
		} else {
			$dados = mysql_fetch_assoc($resultado);
			$_SESSION['logado'] = $dados['idfuncionario'];
			$_SESSION['tipo'] = $dados['tipo'];
			echo "<script>
					location.href='pagina.php';
				  </script>";
		}
	}
?>

<!DOCTYPE >
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Pizzaria Saborella</title>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
	</head>
	<body>
		<div id="login-box">
			<div id="login-logo-image">
				<img src=" imagens/logoT.png"/>
			</div>
			<div class="login-form">
				<form action=""method="post" >
					Usuário:<input type="text" class="login-form login-form-text" name="tlogin" required/>
					Senha:<input type="password" class="login-form login-form-text" name="tsenha" required/>
					<a href="esqueceusenha.php">Esqueceu Senha?</a>
					<input type="submit" id="login-bt" class="login-form" name="btlogin" value="Entrar"/>
				</form>
			</div>
		</div>
	</body>
</html>