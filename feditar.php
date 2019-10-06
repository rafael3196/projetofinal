<?php
	include('conexao.php');
	session_start();
	
	$sql = "select * from funcionario where idfuncionario=".$_REQUEST['id'];
	$resultado = mysql_query($sql, $conexao);
	$dados = mysql_fetch_array($resultado);
	
	if(isset($_POST['btsalvar'])) {
		$nome = $_POST['fnome'];
		$sobrenome = $_POST['fsnome'];
		$nasc = $_POST['fdtnasc'];
		$tel1 = $_POST['ftel1'];
		$tel2 = $_POST['ftel2'];
		$sexo = $_POST['fsexo'];
		$email = $_POST['femail'];
		$cpf = $_POST['fcpf'];
		$rg = $_POST['frg'];
		$login = $_POST['flogin'];
		$senha = $_POST['fsenha'];
		$rsenha = $_POST['fsenha'];
		$tipo = $_POST['ftipo'];
		$status = $_POST['fstatus'];
		$cep = $_POST['fcep'];
		$endereco = $_POST['fende'];
		$numero = $_POST['fnum'];
		$bairro = $_POST['fbairro'];
		$cidade = $_POST['fcidade'];
		$estado = $_POST['fuf'];
		$modificado = $_SESSION['logado'];
		
		//Deixando alguns valores em maiusculo.
		$nome = strtoupper($nome);
		$sobrenome = strtoupper($sobrenome);
		$sexo = strtoupper($sexo);
		$endereco = strtoupper($endereco);
		$bairro = strtoupper($bairro);
		$cidade = strtoupper($cidade);
		$estado = strtoupper($estado);
		//------------------------------------
		
		//comando para alteração dos dados.
		$sql = "update funcionario set f_nome='$nome', f_sobrenome='$sobrenome', f_telefone='$tel1', dtnasc='$nasc', sexo='$sexo', cpf='$cpf', rg='$rg', login='$login', senha='$senha', tipo=$tipo, f_status=$status, f_telefone2='$tel2', cep='$cep', rua='$endereco', numero='$numero', bairro='$bairro', cidade='$cidade', estado='$estado', f_email='$email', modificado='$modificado' where idfuncionario=".$_REQUEST['id'];
		
		if($senha == $rsenha) { //verificação se a senha está correta
			if(mysql_query($sql, $conexao)){//Alterando dados no bando.
				echo "<script>
						alert('Dados alterado com sucesso!');
						location.href='confuncionario.php';
					  </script>";
			} else {
			echo "<script>
					alert('Erro no banco de dados.!');
					location.href='mfuncionario.php';
				  </script>";
			}
		} else { //caso a senha não esteja correta, ele retorna para a pagina de cadastro.
			echo "<script>
					alert('Senha não confere!');
					location.herf='cadfuncionario.php';
				  </script>";
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
	if(isset($_SESSION['tipo'])){
		if($_SESSION['tipo'] == 1){
	?>
	<form name="form" method="post" id="form" class="form" action="" > <!-- formulário alterar algum dados do funcionario -->
		<fieldset>
		Nome <input type="text" name="fnome" id="fnome" size="15" maxlength="20" value="<?php echo $dados['f_nome'];?>"  placeholder="Nome"required /> 
		
		<!-- Sobrenome --><input type="text" name="fsnome" size="15" maxlength="50" value="<?php echo $dados['f_sobrenome'];?>" placeholder="Sobrenome" required/><br/>
		
		Data de Nascimento <input type="date" name="fdtnasc" size="8" maxlength="8" value="<?php echo $dados['dtnasc'];?>" required /><br/>
		
		Sexo:<br/>
		<?php // se for masculino, exibe o primeiro formulario, se for feminino, mostra o segundo.
		if($dados['sexo'] == 'MASCULINO'){ 
			echo "<input type='radio' name='fsexo' value='masculino' checked />Masculino<br/>
				  <input type='radio' name='fsexo' value='feminino' />Feminino<br/>";
		} else {
			echo "<input type='radio' name='fsexo' value='masculino' />Masculino<br/>
				  <input type='radio' name='fsexo' value='feminino' checked />Feminino<br/>";
		}
		?>
		
		Telefone <input type="tel" name="ftel1" size="13" maxlength="13" value="<?php echo $dados['f_telefone'];?>" OnKeyPress="formatar('##-####-#####', this)" placeholder="Telefone/Celular" required/><br/>
		
		<!-- Telefone2 --><input type="text" name="ftel2" size="13" maxlength="13" value="<?php echo $dados['f_telefone2'];?>" OnKeyPress="formatar('##-####-#####', this)" placeholder="Telefone/Celular" /><br/>
		
		E-mail <input type="text" name="femail" size="20" maxlength="40" value="<?php echo $dados['f_email'];?>" /><br/>
		
		CPF <input type="text" name="fcpf" size="14" maxlength="14" value="<?php echo $dados['cpf'];?>" OnKeyPress="formatar('###.###.###-##', this)" required/>
		
		RG <input type="text" name="frg" size="12" maxlength="15" value="<?php echo $dados['rg'];?>" required/><br/>
		</fieldset>
		<br/>
		<fieldset>
		Login <input type="text" name="flogin" size="10" maxlength="30" value="<?php echo $dados['login'];?>" required /><br/>
		
		Senha <input type="text" name="fsenha" size="10" maxlength="20" value="<?php echo $dados['senha'];?>" required /><br/>
		
		Confirmar Senha <input type="text" name="frsenha" size="10" maxlength="20" value="<?php echo $dados['senha'];?>" required /><br/>
		
		Tipo de Conta:
		<?php // verificação do tipo de conta 'Administrador/Normal' (1 para Administrador e 2 para normal)
		if($dados['tipo'] == 2){
			echo "<input type='radio' name='ftipo' value=2 checked />Normal
				  <input type='radio' name='ftipo' value=1 />Administrador<br/>";
		} else {
			echo "<input type='radio' name='ftipo' value=2 />Normal
				  <input type='radio' name='ftipo' value=1 checked />Administrador<br/>";
		}
		// verificação se a conta está ativada ou não (1 para ativado e 2 para desativado)
		echo "Status da Conta:";
		if($dados['f_status'] == 1){
			echo "<input type='radio' name='fstatus' value=1 checked />Ativado
				  <input type='radio' name='fstatus' value=2 />Desativado<br/>";
		} else {
			echo "<input type='radio' name='fstatus' value=1 />Ativado
				  <input type='radio' name='fstatus' value=2 checked />Desativado<br/>";}
		?>
		</fieldset>
		<br/>
		<fieldset>
		
		CEP <input type="text" name="fcep" id="fcep" size="9" maxlength="9" value="<?php echo $dados['cep'];?>" OnKeyPress="formatar('#####-###', this)" required />
		
		Endereço <input type="text" name="fende" id="fende size="30" maxlength="150" value="<?php echo $dados['rua'];?>" required />
		
		Número <input type="text" name="fnum" id="fnum" size="4" maxlength="6" value="<?php echo $dados['numero'];?>" required /><br/>
		
		Bairro <input type="text" name="fbairro" id="fbairro" size="15" maxlength="20" value="<?php echo $dados['bairro'];?>" required /><br/>
		
		Cidade <input type="text" name="fcidade" id="fcidade" size="20" maxlength="40" value="<?php echo $dados['cidade'];?>" required /><br/>
		
		UF <input type="text" name="fuf" id="fuf size="2" maxlength="2" value="<?php echo $dados['estado'];?>" required /><br/>
		</fieldset>
		Ultima modificação feita por: <?php echo $dados['modificado']; ?>
		<br/>
		<input type="submit" value="Salvar" name="btsalvar" onclick="return validacaoFuncionario()"/>
	</form>
	<?php
		} else {
			echo "<script>
					alert('Por favor efetue o login como administrador!');
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