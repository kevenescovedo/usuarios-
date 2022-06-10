<?php
    include ("entidades/Usuario.php");

    if ( !isset($_GET['Alterar']) && isset($_GET['login_usuario']) ) {
        // abrir o formulário para alterar os dados
        $usuario = Usuario::carregaUsuario($_GET['login_usuario']);
?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Alterar Time de Futebol</title>
            </head>
            <body>
                <center><h2>Alterar Senha do Usuário</h2></center>

                <form action="" method="GET">
                    <center>
                        <input type="hidden" name="login_usuario" size="30" id="id" value="<?php echo $usuario->getLogin(); ?>">
                    </center><br>
                    <center>
                        Senha:
                        <input type="password" name="senha" size="30" id="nome" value="">
                    </center><br>
                    

                    <center>
                        <input type="submit" name="Alterar" value="Alterar">
                        <a href="main.php"> Cancelar </a>
                    </center>
                </form>


            </body>
        </html>

<?php
    }
    else if ( isset($_GET['Alterar']) && isset($_GET['senha']) ) {
        // Executar comando para alterar os dados no banco

        $usuario = new	Usuario($_GET['login_usuario'], $_GET['senha'],NULL, NULL);
        $mensagem = $usuario->confirmarAlteracao();

        header("location:main.php?mensagem=".$mensagem.".");
        exit; // para a execução
    }
    else {
      header("location:index.php?mensagem=Dados para alteração incorretos.");
        exit; // para a execução
    }
    


?>


