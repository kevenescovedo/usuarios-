<?php
	session_start();
	unset($_SESSION['logado']);
	unset($_SESSION['login']);
	session_destroy();
	header("location:index.php");
	exit; // para a execução	
?>

	