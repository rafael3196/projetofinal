<?php
	include('conexao.php');
	session_start();

	
	if(isset($_POST['btregis'])){
		$categoria = $_POST['ptipo'];
		$nome = $_POST['pnome'];
		$preco = $_POST['ppreco'];
		//Deixando nome maiusculo
		$nome = strtoupper($nome);
		//-----------------------
		
		if($categoria == 1){ // Se for uma pizza
			$preco2 = $_POST['ppreco2'];
			$preco3 = $_POST['ppreco3'];
			$preco4 = $_POST['ppreco4'];
			$ingredientes = $_POST['ingre'];
			
			//Deixando nome maiusculo
			$ingredientes = strtoupper($ingredientes);
			//-----------------------
			
			$sql = "insert into produtos (idproduto, p_nome, p_preco, p_preco2, p_preco3, p_preco4, ingredientes, id_categoria) values (null, '$nome', '$preco', '$preco2', '$preco3', '$preco4', '$ingredientes', $categoria)";
		} else {
			if($categoria == 2){ // Se for uma bebida
				$sql = "insert into produtos (idproduto, p_nome, p_preco, id_categoria) values (null, '$nome', '$preco', $categoria)";
			} else {// se for um lanche
				$ingredientes = $_POST['ingre'];
				
				//Deixando nome maiusculo
				$ingredientes = strtoupper($ingredientes);
				//-----------------------
				
				$sql = "insert into produtos (idproduto, p_nome, p_preco, ingredientes, id_categoria) values (null, '$nome', '$preco', '$ingredientes', $categoria)";
			}
		}
		if(mysql_query($sql, $conexao)){ //Inserindo dados no bando.
			echo "<script>
					alert('Produto Cadastrado com sucesso!');
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
	<title>Cadastro de Produtos</title>
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
		<input type="radio" name="ptipo" id="ptipo" value="1" onclick="habilitar_pizza()"/>Pizza
		<input type="radio" name="ptipo" id="ptipo" value="2" onclick="habilitar_bebida()"/>Bebidas
		<input type="radio" name="ptipo" id="ptipo" value="4" onclick="habilitar_lanche()"/>Lanches
		<input type="radio" name="ptipo" id="ptipo" value="3" onclick="habilitar_lanche()"/>Promoção<br/>
		Nome: <input type="text" name="pnome" placeholder="Nome do Produto" size="15" /><br/>
		Preço(s): <input type="text" name="ppreco" placeholder="Normal/Média" size="12" maxlength="5" OnKeyPress="formatar('##.##', this)" />
		<input type="text" name="ppreco2" id="ppreco2" placeholder="Grande" size="5" maxlength="5" OnKeyPress="formatar('##.##', this)" />
		<input type="text" name="ppreco3" id="ppreco3" placeholder="Gigante" size="5" maxlength="5" OnKeyPress="formatar('##.##', this)" />
		<input type="text" name="ppreco4" id="ppreco4" placeholder="Maracanã" size="5" maxlength="5" OnKeyPress="formatar('##.##', this)" /><br/>
		Ingredientes:<br/>
		<textarea name="ingre" id="ingre" rows="2" cols="40" maxlength="255" placeholder="Insira os ingredientes básicos como Molho, Mussarela, Bacon, etc." form="form"></textarea><br/>
		<input type="submit" name="btregis" value="Cadastrar" onclick="return validarProduto()"/>
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