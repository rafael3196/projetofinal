<?php
	include('conexao.php');
	session_start();
	$sql_c = "select * from categoria";
	$resultado2 = mysql_query($sql_c, $conexao);
	$dados2 = mysql_fetch_array($resultado2);
	$sql = "select produtos.p_nome, produtos.p_preco, produtos.p_preco2, produtos.p_preco3, produtos.p_preco4, produtos.id_categoria, produtos.ingredientes, categoria.idcategoria, categoria.n_categoria from produtos inner join categoria on produtos.id_categoria=categoria.idcategoria where produtos.idproduto=".$_REQUEST['id'];
	$resultado = mysql_query($sql, $conexao);
	$dados = mysql_fetch_array($resultado);
	
	if(isset($_POST['btsalvar'])) {
		$nome = $_POST['pnome'];
		$preco = $_POST['ppreco'];
		$categoria = $_POST['ptipo'];
		
		//Deixando nome em maiusculo.
		$nome = strtoupper($nome);
		//-------------------------
		
		if($categoria == 1){
			$preco2 = $_POST['ppreco2'];
			$preco3 = $_POST['ppreco3'];
			$preco4 = $_POST['ppreco4'];
			$ingredientes = $_POST['ingre'];
			
			//Deixando nome maiusculo
			$ingredientes = strtoupper($ingredientes);
			//-----------------------
			
			$sql = "update produtos set p_nome='$nome', p_preco='$preco', p_preco2='$preco2', p_preco3='$preco3', p_preco4='$preco4', ingredientes='$ingredientes', id_categoria=$categoria where idproduto=".$_REQUEST['id'];
		} else {
			if($categoria == 2){
				$sql = "update produtos set p_nome='$nome', p_preco='$preco', id_categoria=$categoria where idproduto=".$_REQUEST['id'];
			} else{
				$ingredientes = $_POST['ingre'];
				
				//Deixando nome maiusculo
				$ingredientes = strtoupper($ingredientes);
				//-----------------------
				
				$sql = "update produtos set p_nome='$nome', p_preco='$preco', ingredientes='$ingredientes', id_categoria=$categoria where idproduto=".$_REQUEST['id'];
			}
		}
		
		if(mysql_query($sql, $conexao)){//Alterando dados no bando.
			echo "<script>
					alert('Dados alterado com sucesso!');
					location.href='conproduto.php';
				  </script>";
		} else {
		echo "<script>
				alert('Erro no banco de dados.!');
				location.href='conproduto.php';
			  </script>";
		}
	}
		
?>

<!DOCTYPE html>
<html>
<head>
	<title>Editando Produtos</title>
	<meta charset="utf-8" />
	<script type="text/javascript" src="_javascript/javascript.js"></script>
</head>
<body>
	<?php
	if(isset($_SESSION['tipo'])){
		if($_SESSION['tipo'] == 1){
	?>
	<fieldset>
	<form name="form" id="form" method="post" action="">
		Selecione a categoria do produto antes de efetuar o cadastro:<br/>
		<?php
		if($dados['id_categoria'] == 1){
			echo '<input type="radio" name="ptipo" id="ptipo" value="1" checked onclick="habilitar_pizza()"/>Pizza
			<input type="radio" name="ptipo" id="ptipo" value="2" onclick="habilitar_bebida()"/>Bebidas
			<input type="radio" name="ptipo" id="ptipo" value="4" onclick="habilitar_lanche()"/>Lanches<br/>';
		} else {
			if($dados['id_categoria'] == 2){
				echo '<input type="radio" name="ptipo" id="ptipo" value="1" checked onclick="habilitar_pizza()"/>Pizza
				<input type="radio" name="ptipo" id="ptipo" value="2" checked onclick="habilitar_bebida()"/>Bebidas
				<input type="radio" name="ptipo" id="ptipo" value="4" onclick="habilitar_lanche()"/>Lanches<br/>';
			} else{
				echo '<input type="radio" name="ptipo" id="ptipo" value="1" onclick="habilitar_pizza()"/>Pizza
				<input type="radio" name="ptipo" id="ptipo" value="2" onclick="habilitar_bebida()"/>Bebidas
				<input type="radio" name="ptipo" id="ptipo" value="4" checked onclick="habilitar_lanche()"/>Lanches<br/>';
			}
		}
	?>
		Nome: <input type="text" name="pnome" value="<?php echo $dados['p_nome']; ?>" placeholder="Nome do Produto" size="15" /><br/>
		Preço(s): <input type="text" name="ppreco" value="<?php echo $dados['p_preco']; ?>" placeholder="Normal/Média" size="12" maxlength="5" OnKeyPress="formatar('##.##', this)" />
		<input type="text" name="ppreco2" id="ppreco2" value="<?php echo $dados['p_preco2']; ?>" placeholder="Grande" size="5" maxlength="5" OnKeyPress="formatar('##.##', this)" />
		<input type="text" name="ppreco3" id="ppreco3" value="<?php echo $dados['p_preco3']; ?>" placeholder="Gigante" size="5" maxlength="5" OnKeyPress="formatar('##.##', this)" />
		<input type="text" name="ppreco4" id="ppreco4" value="<?php echo $dados['p_preco4']; ?>" placeholder="Maracanã" size="5" maxlength="5" OnKeyPress="formatar('##.##', this)" /><br/>
		Ingredientes:<br/>
		<textarea name="ingre" id="ingre" rows="2" cols="40" maxlength="255" placeholder="Insira os ingredientes básicos como Molho, Mussarela, Bacon, etc." form="form"><?php echo ($dados['id_categoria'] == 1) ? $dados['ingredientes'] : ''; echo ($dados['id_categoria'] == 4) ? $dados['ingredientes'] : ''; ?></textarea><br/>
		<input type="submit" name="btsalvar" value="Salvar" onclick="return validarProduto()"/>
	</form>
	</fieldset>
	<?php
		} else {//caso tenha alguem logado mas não seja um administrador
			echo "<script>
				alert('Por favor efetue o login como administrador');
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