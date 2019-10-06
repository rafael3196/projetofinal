
<?php
	include('conexao.php');
	session_start();


	if(isset($_POST['btregis'])) {
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
		$rsenha = $_POST['frsenha'];
		$cep = $_POST['fcep'];
		$endereco = $_POST['fende'];
		$numero = $_POST['fnum'];
		$bairro = $_POST['fbairro'];
		$cidade = $_POST['fcidade'];
		$estado = $_POST['fuf'];
		$modificado = $_SESSION['logado'];
		
		//Deixando alguns valores em maisculo.
		$nome = strtoupper($nome);
		$sobrenome = strtoupper($sobrenome);
		$sexo = strtoupper($sexo);
		$endereco = strtoupper($endereco);
		$bairro = strtoupper($bairro);
		$cidade = strtoupper($cidade);
		$estado = strtoupper($estado);
		//------------------------------------
		
		if($senha == $rsenha) { //verificação se a senha está correta.
			$sql = "insert into funcionario (idfuncionario, f_nome, f_sobrenome, dtnasc, f_telefone, f_telefone2, f_email, sexo, cpf, rg, login, senha, cep, rua, numero, bairro, cidade, estado, f_status, tipo, modificado) values (null, '$nome', '$sobrenome', '$nasc', '$tel1', '$tel2', '$email', '$sexo', '$cpf', '$rg', '$login', '$senha', '$cep', '$endereco', '$numero', '$bairro', '$cidade', '$estado', 1, 2, '$modificado')";
			if(mysql_query($sql, $conexao)){ //Inserindo dados no bando.
				echo "<script>
						alert('Usuário cadastrado com sucesso!');
						location.href='cadastrarpedido.php';
					  </script>";
			} else {
				echo "<script>
						alert('Erro no banco de dados.!');
						location.href='mfuncionario.php';
					  </script>";
			}
		} else {//caso a senha não esteja correta, ele retorna para a pagina de cadastro.
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
	<title>Cadastro de Funcionários</title>
	<meta charset="utf-8" />
	<script type="text/javascript" src="_javascript/javascript.js"></script>
	<script type="text/javascript" src="_javascript/jquery-1.11.3.js"></script>
	<script type="text/javascript" src="_javascript/cep.js"></script>
		<link rel="stylesheet" type="text/css" href="css/func.css"/>

	<style>
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
	<?php
	if(isset($_SESSION['tipo'])){ //Testando se há alguem logado
		if($_SESSION['tipo'] == 1){ //Teste para ver se é administrador
	?>
	<form name="form" method="post" id="form1" class="form1" action="" > <!-- formulário para cadastro de funcionários -->
		<fieldset id="fieldset1">
		<br>
		<label id="label1"> Nome :</label>  <label id="label2"> Sobrenome :</label></br> 
		<input type="text" name="fnome" id="fnome" size="15" maxlength="20" placeholder="Nome:"required  class="txt bradius" /> 
		<!-- Sobrenome --><input type="text" name="fsnome" size="15" maxlength="50" placeholder="Sobrenome:" required  class="txt bradius"/><br/>
		
		
	 	<label id="label3"> Data de Nascimento: </label></br>
		<input type="date" name="fdtnasc" size="8" maxlength="8" required />
		
		<fieldset id="fieldset2">
		<legend id="label4"> Sexo: </legend>
		<input type="radio" name="fsexo" value="masculino" checked />Masculino<br/>
		<input type="radio" name="fsexo" value="feminino" />Feminino
		</fieldset>
		
		<label id="label5"> Telefone:</label> </br>
		<input type="text" name="ftel1" size="13" maxlength="13" OnKeyPress="formatar('##-####-#####', this)" placeholder="Telefone/Celular 1" required/>
		<!-- Telefone2 --><input type="text" name="ftel2" size="13" maxlength="13" OnKeyPress="formatar('##-####-#####', this)" placeholder="Telefone/Celular 2" /><br/>
		
		<label id="label6">CPF: </label>  <label id="label7">RG:</label><br>
		<input type="text" name="fcpf" size="14" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" required placeholder="CPF:"/>
		
		
		<input type="text" name="frg" size="12" maxlength="15" required  placeholder="RG:" /><br/>
		
		<label id="label8"> E-mail:</label></br>
		<input type="text" id="cemail"name="femail" size="20" maxlength="40" placeholder="E-mail"/><br/>
		
		
		
		</fieldset>
		<br/>
		<fieldset id="fieldset3">
		<br>
		<label id="label9"> Login: </label>
		<input type="text" name="flogin" size="10" placeholder=" Ex: JoãoSilva"  maxlength="30" required /><br/>
		
		<label id="label10"> Senha: </label><br>
		<input type="text" id="pas" name="fsenha" placeholder="Ex: *******" size="10" maxlength="20" required /><br/>
		
		<label id="label11"> Confirma Senha: </label>
		<br> <input type="text" name="frsenha" size="17" placeholder="Ex: *******"  maxlength="20" required /><br/>
		</fieldset>
		<br/>
		<!--Campo de Endereço-->
		
		<fieldset id="fieldset4">
		
		CEP: <input type="text" name="fcep" id="fcep" size="9" maxlength="9" placeholder="CEP" OnKeyPress="formatar('#####-###', this)" required  />
		
		Endereço: <input type="text" name="fende" id="fende size="30" placeholder="Endereço"maxlength="150" required /><br/>
		
		Bairro:<br> <input type="text" name="fbairro" id="fbairro" size="15" placeholder="Bairro" maxlength="20" required /></br>
		
		Cidade:<br> <input type="text" name="fcidade" id="fcidade" size="20" placeholder="Cidade" maxlength="40" required /><br/>
		
		Número:<br> <input type="text" name="fnum" id="fnum" size="4" placeholder="Número" maxlength="6" required /></br>
		UF:<br><input type="text" name="fuf" id="fuf" size="4" maxlength="2" placeholder="UF" required /><br/>
		</fieldset>
		<br/>
		<input type="submit" value="Registrar" name="btregis" class="registrar" onclick="return validacaoFuncionario()"/>
	</form>
	<?php
		} else { //caso tenha alguem logado mas não seja um administrador
			echo "<script>
					alert('Por favor Efetue o Login !');
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