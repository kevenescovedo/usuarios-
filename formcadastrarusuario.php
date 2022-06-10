<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="index.php">Entrar</a>
<?php 
            if (isset($_GET['mensagem'])) {
                echo "<center>";
				echo $_GET['mensagem'];
				echo "</center>";
               
            }
        ?>
    <center><h2>Cadastrar Usuario</h2></center>

   
    <form action="cadastrarusuario.php" method="POST">
        <center>
            Login:
            <input type="text" name="login" size="30" id="nome">
        </center><br>
        <center>
            Senha:
            <input type="password" name="senha" size="30" id="tecnico" >
        </center><br>
        <center>
            Orientador:
            <select name="orientador">
	        <?php 
            include ("entidades/Orientador.php");
             var_dump(Orientador::TodosOrientadores());
          foreach (Orientador::TodosOrientadores() as $orientador) {
                  $value = $orientador->getId();
                  $name = $orientador->getNomeOrientador();
               echo "<option value='$value'>$name</option>";
            }
            ?>
            </select>
             </br>
            <input type="submit" name="Cadastrar" value="Cadastrar">
            <a href="index.php"> Cancelar </a>
        </center>
    </form>


</body>
</html>