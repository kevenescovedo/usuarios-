<?php
	include("include/very_logged.php");
?>

<!DOCTYPE html>
<html lang="en">
<?php include("entidades/Usuario.php"); ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Você está autenticado</h1>
<table align="center" border="1">
        <tr >
            <td width="600"><center><h2>CRUD de Usuários</h2></center></td>
			<td width="200">
				<?php 
					echo "Bem vindo ".$_SESSION['login']	; 
					echo "<a href='logout.php'>[Sair]</a>";
				?>
			</td>
        </tr>
        
        <?php 
            if (isset($_GET['mensagem'])) {
                echo '<tr >
                        <td width="800" bgcolor="red">
                            <center>';
                            echo $_GET['mensagem'];
                echo        '</center>
                        </td>
                    </tr>';
            }
        ?>
          
        <?php
            $arrayUsuarios = Usuario::TodosUsuarios();
            //echo $arrayTimes[0]->getNome();
        ?>

        <tr>
            <td colspan=2>

                <br>
                <a href="formcadastrarusuario.php">Incluir Time</a>
                <br><br>

                <!-- Tabela para exibir os times -->
                <table border="1">
                    <tr bgcolor="#D3D3D3">
                        <td width="180px"><strong>Login </strong></td>
                        <td width="200px"><strong>Nome Orientador</strong></td>
                      
                        <td width=""></td>
                    </tr>

                    <?php

                    foreach ($arrayUsuarios as $usuario) {
                        echo '<tr>
                                <td>'.$usuario->getLogin().'</td>
                                <td>'.$usuario->nome_orientador.'</td>
                               
                                <td>
                                    <a href="alterarusuario.php?login_usuario='.$usuario->getLogin().'">Alterar</a>
                                    <a href="excluirusuario.php?login_usuario='.$usuario->getLogin().'">Excluir</a>
                                </td>
                            </tr>';
                        }
                    ?>

                </table>
                <br><br>

            </td>
        </tr>
        <tr>
            <td colspan=2>
                <center>...</center>
            </td>
        </tr>

    </table>
</body>
</html>

