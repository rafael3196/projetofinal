<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
<h2>Olá, <?php 
include('conexao.php');
$sql = "select * from login";
$resultado = mysql_query($sql, $conexao);
while ($dados = mysql_fetch_array($resultado)) {
echo "<td>".$dados['nome'];

	
} 
?>!</h2>
</body>
 </html>
