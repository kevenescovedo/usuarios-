<?php

include ("entidades/Usuario.php");

    if (isset($_POST['Cadastrar']) && isset($_POST['senha']) && isset($_POST['login']) && isset($_POST['orientador'])) {

        $login =$_POST['login'];
        $senha = $_POST['senha'];
        $orientador_id = $_POST['orientador'];
        echo  $orientador_id;
        $usuario = new Usuario($login, $senha,$orientador_id, date('Y-m-d H:i:s'));

        $usuariochecked = Usuario::carregaUsuario($login);
        var_dump($usuariochecked);
        if ($usuariochecked != null) {
            header("location:formcadastrarusuario.php?mensagem=Usuário já cadastrado.");
            exit; // para a execução
        }
        $mensagem = "Usuário Cadastrado!";
        if ( $usuario->inserir() == false ) {
            $mensagem = "Erro ao inserir Usuário";
        }
   header("location:formcadastrarusuario.php?mensagem=".$mensagem);
        exit; // para a execução
    }
    else {
     header("location:formcadastrarusuario.php?mensagem=Dados para o cadastro não informados.");
        exit; // para a execução
    }


?>