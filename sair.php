<?php

session_start();
unset($_SESSION['usuario']);
unset($-SESSION['senha']);
session_destroy();


heade("Location: index.php");
?>