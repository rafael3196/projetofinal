<?php
	include('conexao.php');
	session_start();

	$sql = "delete from cliente where idcliente=".$_REQUEST['id'];
	if(mysql_query($sql, $conexao)){//Excluindo dados no bando.
		echo "<script>
				alert('Cliente deletado com sucesso!');
				location.href='concliente.php';
			  </script>";
	} else {
	echo "<script>
			alert('Erro no banco de dados!');
			location.href='concliente.php';
		  </script>";
	}
?>