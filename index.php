<HTML>
	<HEAD>
	</HEAD>
	<BODY>
	<?php 
            if (isset($_GET['mensagem'])) {
                echo "<center>";
				echo $_GET['mensagem'];
				echo "</center>";
               
            }
        ?>
		<br>
        <a href="formcadastrarusuario.php">Cadastrar</a>
		<CENTER><H2>login de Sistema</H2></CENTER>
		<br>
		<br>
		<form action="validarusuario.php" method="POST">
        <center>
            Login:
            <input type="text" name="login" size="10" id="login">
        </center><br>
        <center>
            Senha:
            <input type="password" name="senha" size="10" id="senha">
        </center><br>
     

        <center>
            <input type="submit" name="Acessar" value="Acessar">
            <a href="index.php"> Limpar </a>
        </center>
    </form>
	
	</BODY>

</HTML>