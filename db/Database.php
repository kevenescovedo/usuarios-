<?php
class Database {
    //atributos
    const HOST="localhost";
    const DBNAME="estagio";
    const USERNAME="root";
    const PASSWORD="";

    private $conexao;
    private $erro;

    //métodos
    public function __construct()
    {
        $this->erro = "";
        $this->conexao = new PDO("mysql:host=".self::HOST.";dbname=".self::DBNAME, self::USERNAME, self::PASSWORD);
        $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($this->conexao == null) {
            echo "Erro ao criar a conexão com o Banco de Dados";
           $this->erro = "Erro ao criar a conexão com o Banco de Dados";
        }
    }

    public function getErro() {
        return $this->erro;
    }

    public function executar($comandoSQL) {
        $executou = false;
        try {
            $res = $this->conexao->exec($comandoSQL);
            $executou = true;
        }
        catch (PDOException $e) {
            var_dump($e);
        }
        return $executou;
    }

    public function selecionar($comandoSQL) {
        try {
            $rs = $this->conexao->query($comandoSQL);
            return $rs;
        }
        catch (PDOException $e) {
            
        }
        return null;
    }

}

?>