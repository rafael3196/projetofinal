<?php
include('conexao.php');
session_start();
$login = $_SESSION['logado'];
$sql = "select * from funcionario where login=".$login;
$resultado = mysql_query($sql, $conexao);
$dados = mysql_fetch_array($resultado);
?>
<!Doctype html>
<head>
<meta charset="utf-8"/>
	<title>Pizzaria Saborella</title>
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
<h3>Olá <?php echo $dados['f_nome']; ?>!</h3>

<body>
 </html>