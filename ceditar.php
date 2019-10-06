<?php
	include('conexao.php');
	session_start();
	$sql = "select * from cliente where idcliente=".$_REQUEST['id'];
	$resultado = mysql_query($sql, $conexao);
	$dados = mysql_fetch_array($resultado);
	if(isset($_POST['btsalvar'])) {
		$nome = $_POST['cnome'];
		$telefone = $_POST['ctelefone'];
		$cep = $_POST['ccep'];
		$endereco = $_POST['cende'];
		$numero = $_POST['cnum'];
		$complemento = $_POST['ccomple'];
		$prefe = $_POST['cpref'];
		$bairro = $_POST['cbairro'];
		$cidade = $_POST['ccidade'];
		$estado = $_POST['cuf'];
		
		//Deixando alguns valores em maiusculo.
		$nome = strtoupper($nome);
		$complemento = strtoupper($complemento);
		$prefe = strtoupper($prefe);
		$endereco = strtoupper($endereco);
		$bairro = strtoupper($bairro);
		$cidade = strtoupper($cidade);
		$estado = strtoupper($estado);
		//------------------------------------
		
		//comando para alteração dos dados.
		$sql = "update cliente set c_nome='$nome', c_telefone='$telefone', c_cep='$cep', c_rua='$endereco', c_comple='$complemento', c_prefe='$prefe', c_numero='$numero', c_bairro='$bairro', c_cidade='$cidade', c_estado='$estado' where idcliente=".$_REQUEST['id'];
		if(mysql_query($sql, $conexao)){
			echo"<script>
					alert('Dados alterados com sucesso!');
					location.href='concliente.php';
				</script>";
		} else {
			mysql_error();
		}
	}	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Editando Dados</title>
	<meta charset="utf-8" />
	<script type="text/javascript" src="_javascript/javascript.js"></script>
	<script type="text/javascript" src="_javascript/jquery-1.11.3.js"></script>
</head>
<body>
	<?php
	if(isset($_SESSION['tipo'])){ //Teste para saber se existe alguem logado.
		if($_SESSION['tipo'] == 1){ //Teste para saber se a conta de administrador
	?>
	<form name="form" method="post" id="form" class="form" action="" >
		Nome: <input type="text" name="cnome" id="cnome" size="15" maxlength="20" value="<?php echo $dados['c_nome'];?>"  placeholder="Nome" required /><br/>
		Telefone: <input type="text" name="ctelefone" id="ctelefone" size="13" value="<?php echo $dados['c_telefone'];?>" placeholder="Telefone/Celular" maxlength="13" OnKeyPress="formatar('##-####-#####', this)" required /><br/>
		CEP <input name="ccep" id="ccep" size="9" placeholder="CEP*" value="<?php echo $dados['c_cep'];?>" maxlength="9" OnKeyPress="formatar('#####-###', this)" required /><br/>
		Endereço: <input name="cende" id="cende" placeholder=" Endereço:*" id=" cende" value="<?php echo $dados['c_rua']?>" size="30" maxlength="150" required />
		Número: <input name="cnum" placeholder="Número:*" id="cnum" size="4" value="<?php echo $dados['c_numero']?>" maxlength="6" required /><br/>
		Complemento: <input name="ccomple" placeholder=" Complemento:" id="ccomple" size="20"value="<?php echo $dados['c_comple']?>" /><br/>
		Ponto de Referência: <input name="cpref" id="cpref" placeholder=" Ponto de Referência:" value="<?php echo $dados['c_prefe']?>" /><br/>
		Bairro: <input name="cbairro" id="cbairro" placeholder="Bairro:*"size="15" value="<?php echo  $dados['c_bairro']?>" maxlength="20" required /><br/>
		Cidade: <input name="ccidade" id="ccidade" placeholder="Cidade*" size="20" value="<?php echo $dados['c_cidade']?>" maxlength="40" required /><br/>
		UF: <input name="cuf" id="cuf" size="2" placeholder="UF:*"value="<?php echo $dados['c_estado']?>" maxlength="2" required /><br/>
		<input type="submit" value="Salvar" name="btsalvar" />
		<input type="button" value="Limpar" onclick="limpar()"/>
	</form>
	<?php
		} else {
			echo "<script>
				alert('Por favor efetue login como administrador!');
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