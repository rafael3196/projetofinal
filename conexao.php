<?php
/* performs the connection with service of mysql */
$conexao = mysql_connect('localhost', 'root', 'usbw');
/*select database specifc */
$dados = mysql_select_db('projeto', $conexao);
?>