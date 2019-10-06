<?php
	include('conexao.php');
	session_start();
	
	$sql = "select * from produtos where id_categoria=1";
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
		<th width="200">Sabores</td>
		<th width="200">Média(30CM)</td>
		<th width="200">Grande(35CM)</td>
		<th width="200">Gigante(40CM)</td>
		<th width="200">Maracanã(45CM)</td>
		<th width="200">Igredientes</td>
	</tr>
	<form name="form" method="post" action=""/>
	<?php
		while ($dados = mysql_fetch_array($resultado)) {//VER depois
			echo "<tr>";
			?><td><input type="checkbox" name="pizza" value="<?php echo $dados['idproduto']; ?>" /><?php echo $dados['p_nome']; ?></td>
			<td><input type="radio" name="tamanho" value="1" />R$ <?php echo $dados['p_preco']; ?></td>
			<td><input type="radio" name="tamanho" value="2" />R$ <?php echo $dados['p_preco2']; ?></td>
			<td><input type="radio" name="tamanho" value="3" />R$ <?php echo $dados['p_preco3']; ?></td>
			<td><input type="radio" name="tamanho" value="4" />R$ <?php echo $dados['p_preco4']; ?></td>
			<td><?php echo $dados['ingredientes']; ?></td>
			<?php echo "</tr>";
		}
		echo "</table>"; //Fechamento do Table
		echo "<br/>";
		echo '<textarea name="obs" id="obs" rows="4" cols="40" maxlength="255" placeholder="Observações" form="form"></textarea><br/>';
	?>
		<input type="submit" name="btsalvar" value="Adicionar" />
	</form>
</body>
</html>