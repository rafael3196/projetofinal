<?php
	include('conexao.php');
	session_start();
	
	$sql = "select * from produtos where id_categoria=2";
	$resultado = mysql_query($sql, $conexao) or die (mysql_error());
	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8"/>
</head>
<body>
	<table border="1">
	<tr>
		<th width="200">Nome</td>
		<th width="200">Preço</td>
	</tr>
	<?php
		while ($dados = mysql_fetch_array($resultado)) {
			echo "<tr>";
			?><td><input type="radio" name="bebida" value="<?php echo $dados['idproduto']; ?>" /><?php echo $dados['p_nome']; ?></td>
			<td>R$ <?php echo $dados['p_preco']; ?></td>
			<?php echo "</tr>";
		}
		echo "</table>"; //Fechamento do Table
		echo "<br/>";
	?>
</body>
</html>