<!DOCTYPE html">
<html>
<head>
	<title>Pizzaria Saborella</title>
	<link rel="stylesheet" type="text/css" href="css/mi.css"/>
	
	<script type="text/javascript" src="_javascript/javascript.js"></script>

	<style>
body {
background: url(imagens/12.jpg)no-repeat center fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
}  

</style>
</head>
</html>
<?php
	session_start();
	/*Realiza a conexão com o servidor do mysql */  
	$conexao = mysql_connect('localhost', 'root', 'usbw');
	/*Seleciona um banco de dados específico */
	$banco = mysql_select_db('projeto', $conexao);

	//pego o nome da função que foi passada para o campo hidden
	$funcao = $_REQUEST['action'];
	
	//verifica se a função existe
	//http://br2.php.net/manual/pt_BR/function.function-exists.php
	
	if(function_exists($funcao)){
		//call_user_func Chama uma função de usuário dada pelo primeiro parâmetro
		//http://br2.php.net/manual/pt_BR/function.call-user-func.php
		call_user_func($funcao);
	}
	
	function registrar(){
		$nome = $_POST['cnome'];
		$telefone = $_POST['ctelefone'];
		$cep = $_POST['ccep'];
		$endereco = $_POST['cende'];
		$complemento = $_POST['ccomple'];
		$ponto = $_POST['cpref'];
		$numero = $_POST['cnum'];
		$bairro = $_POST['cbairro'];
		$cidade = $_POST['ccidade'];
		$estado = $_POST['cuf'];
		
		//Deixando alguns valores em maiusculo.
		$nome = strtoupper($nome);
		$endereco = strtoupper($endereco);
		$complemento = strtoupper($complemento);
		$ponto = strtoupper($ponto);
		$bairro = strtoupper($bairro);
		$cidade = strtoupper($cidade);
		$estado = strtoupper($estado);
		//-------------------------------------
		
		$sql = "insert into cliente(idcliente, c_nome, c_telefone, c_cep, c_rua, c_comple, c_prefe, c_numero, c_bairro, c_cidade, c_estado) values (null, '$nome', '$telefone', '$cep', '$endereco', '$complemento', '$ponto', '$numero', '$bairro', '$cidade', '$estado')";
		if(mysql_query($sql)){ //Inserindo dados no banco.
			echo "<script>
					alert('Cliente Cadastrado com sucesso!');
					location.href='cadastrarpedido.php';
				  </script>";
		} else {
			mysql_error();
		}
	}
	
	function pesquisar(){
		$telefone = $_POST['ctelefone'];
		$sql = "select * from cliente where c_telefone='$telefone'";
		$resultado = mysql_query($sql) or die (mysql_error());
		$registros = mysql_num_rows($resultado);
		if($registros==0) {
			echo "<script>
				alert('Nenhum cliente com esse número encontrado!');
				location.href='cadastrarpedido.php?acao=2&tel=$telefone';
			  </script>";
		} else { //Caso exista alguem já cadastrado com esse número ele vai mandar para a mesma página com uma 'acao' e o ID da pessoa registrada
			$dados = mysql_fetch_assoc($resultado);
				header("Location:cadastrarpedido.php?acao=1&id=".$dados['idcliente']);
		}
	}

?>
