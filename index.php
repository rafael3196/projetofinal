<?php
	include('conexao.php');
	session_start();
	if(isset($_POST['btlogin'])){ //Verificação de login e senha.
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

<head>
	<meta charset="utf-8"/>
	<title>Pizzaria Saborella</title>
<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
<script type="text/javascript" src="_javascript/javascript.js"></script>
<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

<style>
.teste {
     float: left;
	 margin: 5px;
	 padding: 15px;
	 width: 300px;
	 heigth: 300px;
	 border: 1px solid black;
} 
body {
background: url(imagens/10.jpg)no-repeat center fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
}  
</style>

</head>
<body>
  

<div id="login" class="bradius">
	<div class="message"></div>
	<div class="logo"><img src=" imagens/logoT.png"/></div>
	<div Class="acomodar">
	  <form action=""method="post" > <!--onSubmit="validacaoLogin()"--> 
	  <label for="usuario">Usuário:<input id="tlogin" type="txt" class="txt bradius" name="tlogin" value="" required/>
	  <label for="senha">Senha:<input id="tsenha"type="password" class="txt bradius" name="tsenha" value="" required/><p>
	  <a href="esqueceusenha.php">Esqueceu Senha ?</a>
	   <input type="submit" class="sb bradius" name="btlogin" value="Entrar"/> <!--onclick="return validacaoLogin()"-->
	  
	  </form>
	  <!--acomodar-->
	  </div>
	  <!--login-->
	 </div>
	

	  </body>
</html>