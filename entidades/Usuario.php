<?php

include ("db/Database.php");

class Usuario {
    //Atributos
    private $login; // int
    private $orientador_id; // int
    private $senha;
    private $data_criacao;
   public  $orientador_nome;
    //Métodos
    public function __construct($login,$senha,$orientador_id, $data_criacao){
        $this->login = $login;        
        $this->orientador_id = $orientador_id;        
        $this->senha = $senha; 
        $this->data_criacao = $data_criacao;       
            
    }
        
    public function getLogin() {
        return $this->login;
    }
    public function setLogin($login) {
        $this->login = $login;
    }

    public function getOrientadorId() {
        return $this->orientador_id;
    }
    public function setOrientadorId($orientador_id) {
        $this->orientador_id = $orientador_id;       
    }

    public function getSenha() {
        return $this->senha;
    }
    public function setSenha($senha) {
        $this->senha = $senha;       
    }
    public function getDatacriacao() {
        return $this->data_criacao;
    }
    public function setDataCriacao($data_criacao) {
        $this->data_criacao = $data_criacao;       
    }
    public function CriptografarSenha() {
        $md5 = md5($this->getSenha());       
        $sha1 = sha1($md5);
        $hash = hash('sha256', $sha1);
        return $hash;
    }

   /* public function inserir() {
        $banco = new Database();

        $comandoSQL = "Insert into times(nome, tecnico, presidente, anoFundacao) values ('".$this->nome."', '".$this->tecnico."', '".$this->presidente."', ".$this->anoFundacao.")";
        
        return $banco->executar($comandoSQL);
    } 

    public function confirmarAlteracao() {
        $comandoSQL = 'Update times set nome="'.$this->nome.'", tecnico="'.$this->tecnico.'", presidente="'.$this->presidente.'", anofundacao='.$this->anoFundacao.' where id='.$this->id;

        $banco = new Database();
        if ( $banco->executar($comandoSQL) ) {
            return "Time alterado com sucesso!!";
        }
        return "Erro ao alterar Time.";
    }

    public function excluir() {
        $comandoSQL = "Delete from times where id=".$this->id;

        $banco = new Database();
        if ( $banco->executar($comandoSQL) ) {
            return "Time exluído com sucesso!";
        }
        return "Erro ao excluir Time.";
    }

    public static function TodosTimes() {
        $banco = new Database();

        $arrayTimes = array();
        $comandoSQL = "Select * from times";
        $rsdados = $banco->selecionar($comandoSQL);

        while ($linha = $rsdados->fetch(PDO::FETCH_ASSOC)) {
            $time = new Time($linha['id'], $linha['nome'], $linha['tecnico'], $linha['presidente'], $linha['anofundacao']);
            $arrayTimes[] = $time;
        }

        return $arrayTimes;
    } */

    public function   checarUsuarioCadastrado() {
   echo $this->senha;
   echo $this->login;

        $banco = new Database();
    $senha = $this->CriptografarSenha();
    echo $senha;
        $rs = $banco->selecionar("Select * from usuario where login_usuario  = '$this->login' and  senha = '$senha'");
        if ($linha = $rs->fetch(PDO::FETCH_ASSOC)) {
            $usuario = new Usuario($linha['login'], $linha['senha'], $linha['orientador_id'], $linha["data_criacao"]);
            return $usuario;
        }
        return null;
    }
    public function inserir() {
        echo $this->orientador_id;
        $banco = new Database();

        $comandoSQL = "Insert into usuario(login_usuario, senha, orientador_id,  data_criacao) values ('".$this->login."', '".$this->CriptografarSenha()."', '".$this->orientador_id."', '".$this->data_criacao."')";
        
        return $banco->executar($comandoSQL);
    }

	public static function carregaUsuario($login_usuario) {
	
        $banco = new Database();

        $rs = $banco->selecionar("select * from usuario where login_usuario = '$login_usuario'");
        if ($linha = $rs->fetch(PDO::FETCH_ASSOC)) {
		
            $usuario = new Usuario($linha['login_usuario'],$linha['senha'],$linha['orientador_id'],$linha['data_criacao']);
            return $usuario;
        }
        return null;
    }

	 public function confirmarAlteracao() {
        $comandoSQL = "Update usuario set senha= '".$this->CriptografarSenha()."' where login_usuario like '" .$this->login."'";

        $banco = new Database();
        if ( $banco->executar($comandoSQL) ) {
            return "Usuario alterado com sucesso!!";
        }
        return "Erro ao alterar Usuario.";
    }
	 public static function TodosUsuarios() {
        $banco = new Database();

        $arrayUsuarios = array();
        $comandoSQL = "Select login_usuario, nome_orientador from usuario, orientador where orientador.orientador_id = usuario.orientador_id ";
        $rsdados = $banco->selecionar($comandoSQL);

        while ($linha = $rsdados->fetch(PDO::FETCH_ASSOC)) {
            $usuario = new Usuario($linha['login_usuario'], null,null, null);
			$usuario->nome_orientador = $linha['nome_orientador'];
            $arrayUsuarios[] = $usuario;
        }

        return $arrayUsuarios;
    }
	public function excluir() {
        $comandoSQL = "Delete from usuario where login_usuario like '".$this->login."'";

        $banco = new Database();
        if ( $banco->executar($comandoSQL) ) {
            return "Usuario exluído com sucesso!";
        }
        return "Erro ao excluir Usuario.";
    }
}