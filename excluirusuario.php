<?php

include ("entidades/Usuario.php");

    if (isset($_GET['login_usuario'])) {
        $usuario = Usuario::carregaUsuario($_GET['login_usuario']);

        if ($usuario == null) {
            header("location:index.php?mensagem=Usuário a ser excluído não encotrado.");
            exit; // para a execução
        }
        else {
            // apagar o time do banco

            $mensagem = $usuario->excluir();
           header("location:main.php?mensagem=".$mensagem.".");
            exit; // para a execução
        }
    }

?>