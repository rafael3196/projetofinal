<?php
	include('conexao.php');
	session_start();
	
	if(isset($_SESSION['tipo'])){ //Testando se há alguem logado
		if($_SESSION['tipo'] == 1){ //Teste para ver se é administrador
			$sql = "delete from produtos where idproduto=".$_REQUEST['id'];
			if(mysql_query($sql, $conexao)){ //Excluindo dados no bando.
				echo "<script>
						alert('Produto Deletado com sucesso!');
						location.href='conproduto.php';
					  </script>";
			} else {
			mysql_error();
			}
		} else { //caso tenha alguem logado mas não seja um administrador
			echo "<script>
				alert('Por favor efetue o login como Administrador!');
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
