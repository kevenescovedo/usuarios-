<?php 

session_start();

if (!isset($_SESSION['logado'])) {
    $mensagem = "Faça acesso ao sistema.";
    header("location:index.php?mensagem=".$mensagem);
    exit; // para a execução	
}
else {
}
?>
