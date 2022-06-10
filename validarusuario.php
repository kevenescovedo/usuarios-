<?php
	session_start();
	include ("entidades/Usuario.php");
?>
<HTML>
	<HEAD>
	</HEAD>
	<BODY>
		<CENTER><H2>Validação de usuário</H2></CENTER>
		<br>
		<br>
		
		
		<?php
		if (isset($_POST['Acessar'])) {
			$login= $_POST['login'];
			$senha= $_POST['senha'];			
			$_SESSION['login'] = $login;
				$_SESSION['logado'] = true;
				$usuario = new Usuario($login,$senha, null, null);
				$usuario = $usuario->checarUsuarioCadastrado();
			// certo seria consultar o banco
			if ($usuario){

				header("location:main.php");
				exit; // para a execução	
			}
			else {
				//echo "Usuário ou senha inválidos";
				$mensagem = "Usuário ou senha inválidos";
				unset($_SESSION['logado']);
				unset($_SESSION['login']);
				session_destroy();
				header("location:index.php?mensagem=".$mensagem);
				exit; // para a execução	
			}
			
		}
		else {
			$mensagem = "Usuário e Senha não informados!";
			header("location:index.php?mensagem=".$mensagem);
			exit; // para a execução	
		}
		?>
	</BODY>

</HTML>		