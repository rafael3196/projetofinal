<?php
	include('conexao.php');
	session_start();
	$sql = "select produtos.idproduto, produtos.p_nome, produtos.p_preco, produtos.p_preco2, produtos.p_preco3, produtos.p_preco4,produtos.id_categoria, categoria.n_categoria from produtos inner join categoria on produtos.id_categoria=categoria.idcategoria";
	$resultado = mysql_query($sql) or die (mysql_error());
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<title>Consultar Produtos</title>
	<script type="text/javascript" src="_javascript/javascript.js"></script>
	<link rel="stylesheet" type="text/css" href="css/confun.css"/>
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
			<th width="220">Preço</td>
			<th width="220">Categoria</td>
			<th width="220">Editar Dados</td>
			<th width="220">Excluir</td>
		</tr>
	</thead>
		<?php
			while ($dados = mysql_fetch_array($resultado)) {
				echo "<tr>";
				?><td><?php echo $dados['idproduto']?></td><td><?php echo $dados['p_nome']?></td><td>R$ <?php echo $dados['p_preco']; echo ($dados['id_categoria'] == 1) ? " / ".$dados['p_preco2']." / ".$dados['p_preco3']." / ".$dados['p_preco4'] : '';?></td><td><?php echo $dados['n_categoria']?></td><td><a href="peditar.php?id= <?php echo $dados['idproduto']?>">Editar</a></td><td><a href="pexcluir.php?id= <?php echo $dados['idproduto']?>" onclick='return confirm("Deseja EXCLUIR esse produto?")'>Excluir</a></td>
				<?php echo "</tr>";
			}
		} else {
			if($_SESSION['tipo'] == 2){ //Parte do Funcionario
	?>
	<table class="table tableresponsive" width="500" border="1">
	<thead>
		<tr>
			<!-- th para negrito e centralizado -->
			<th width="200">ID</td>
			<th width="2600">Nome</td>
			<th width="220">Preço</td>
			<th width="220">Categoria</td>
		</tr>
	</thead>
		<?php
			while ($dados = mysql_fetch_array($resultado)) {
				echo "<tr>";
				?><td><?php echo $dados['idproduto']?></td><td><?php echo $dados['p_nome']?></td><td><?php echo $dados['p_preco']?></td><td><?php echo $dados['n_categoria']?></td>
				<?php echo "</tr>";
			}
			}
		}
	}  else { 
			echo "<script>
			alert('Por favor Efetue o Login !');
			location.href='index.php';
		  </script>";
	}
	?>
</body>
</html>
