<?php
	include('conexao.php');
	session_start();
	$acao = 0;
	if(isset($_REQUEST['acao'])){
		if($_REQUEST['acao'] == 1){ //ação executada caso tenha alguem com número registrado no banco.
			$acao = 1;
			$idcliente = $_REQUEST['id'];
			$sql = "select * from cliente where idcliente=".$idcliente;
			$resultado = mysql_query($sql, $conexao);
			$dados = mysql_fetch_array($resultado);
		}
		if($_REQUEST['acao'] == 2){ //ação executada caso não encontre um cliente com número informado.
			$acao = 2;
			$telefone = $_REQUEST['tel'];
		}
	}
?>

<!DOCTYPE html">
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Pizzaria Saborella</title>
	<link rel="stylesheet" type="text/css" href="css/mi.css"/>
	
	<script type="text/javascript" src="_javascript/javascript.js"></script>

	<style >
body {
background: url(imagens/12.jpg)no-repeat center fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
}  

</style>
</head>

<body>

	<?php
	if(isset($_SESSION['tipo'])){
	?>
	<input type="radio" name="popcao" value="2" onclick="desabilita_cliente()" /> Balcão<br/>
	<input type="radio" name="popcao" value="1" onclick="habilita_cliente()"/> Deliver
	
	<form name="form" id="form" method="post" action="action.php">
	<input type="hidden" id="action" name="action" />
		<fieldset>
		<?php
		if($acao==0){ //formulario exibido ao entrar na página
		?>
		
			 <input type="text" id="ctelefone"  name="ctelefone" size="13" maxlength="13" OnKeyPress="formatar('##-####-#####', this)" placeholder=" Telefone/Celular*" required/>
			
		<?php
		} else {
			if($acao==1){ //formulario exibido caso já tenha alguem registrado e manterá o numéro informado no campo
			?>
				<input type="text"  id="ctelefone" name="ctelefone" size="13" value="<?php echo $dados['c_telefone'];?>" maxlength="13" OnKeyPress="formatar('##-####-#####', this)" placeholder="Telefone/Celular" required/>
			<?php
			} else { // formulario exibido caso não tenha ninguem com número de telefone inserido
			?>
				<input type="text"  id="ctelefone" name="ctelefone" size="13" value="<?php echo $telefone;?>" maxlength="13" OnKeyPress="formatar('##-####-#####', this)" placeholder="Telefone/Celular" required/>
			<?php
			}
		}
		?>
		
		<input type="button" id="pesquisafsm-botao" value="Pesquisar" onclick="pesquisarTelefone('form', 'pesquisar')"/>
		<input type="text" name="cnome" id="cnome"size="30" value="<?php echo ($acao == 1) ? $dados['c_nome']:''?>" placeholder=" Nome*"  maxlength="23" required />
		<input type="text" name="ccep" id="ccep" size="9" placeholder=" CEP*" value="<?php echo ($acao == 1) ? $dados['c_cep']:''?>" maxlength="9" OnKeyPress="formatar('#####-###', this)" required />
		<input type="button" id="pesqcep" name="btlogin" value="Pesquisar"/>
		<input type="text" name="cende" id="cende" placeholder=" Endereço:*" id=" cende" value="<?php echo ($acao == 1) ? $dados['c_rua']:''?>" size="30" maxlength="150" required />
		<input type="text" name="cnum" placeholder=" Número:*" id="cnum" size="4" value="<?php echo ($acao == 1) ? $dados['c_numero']:''?>" maxlength="6" required />
		<input type="text" name="ccomple" placeholder=" Complemento:" id="ccomple" size="7"value="<?php echo ($acao == 1) ? $dados['c_comple']:''?>" />
		<input type="text" name="cpref" id="cpref" placeholder=" Ponto de Referência:" value="<?php echo ($acao == 1) ? $dados['c_prefe']:''?>" />
		<input type="text" name="cbairro" id="cbairro" placeholder=" Bairro:*"size="15" value="<?php echo ($acao == 1) ? $dados['c_bairro']:''?>" maxlength="20" required />
		<input type="text" name="ccidade" id="ccidade" placeholder=" Cidade*" size="20" value="<?php echo ($acao == 1) ? $dados['c_cidade']:''?>" maxlength="40" required />
		<input type="text" name="cuf" id="cuf" size="2" placeholder=" UF:*"value="<?php echo ($acao == 1) ? $dados['c_estado']:''?>" maxlength="2" required /><br/><p/>
		Campos que contém * são preenchimento obrigatórios.
		</fieldset>
		
		<input type="submit"  id="cregistra" value="Registrar" onclick="validacaoCliente('form', 'registrar')" /> 
		<INPUT type="reset"  id="climpa" value="Limpar">
	</form>
	<form name="form2" id="form2" method="post" action="">
		<input type="button" name="pizza" id="pizza" value="Pizzas" onclick="location.href='pizza.php'" />
		<input type="button" name="bebida" id="bebida" value="Bebidas" onclick="location.href='bebida.php'" />
		<input type="button" name="lanche" id="lanche" value="Lanches" onclick="location.href='lanche.php'" />
	</form>
</div>
	<?php
	} else {
		echo "<script>
				alert('Por favor efetue o login');
				location.href='index.php';
			  </script>";
	}
	?>
</body>
</html>
