<?php 
include ("db/Database.php");
class Orientador {
    private $id; // int
    private $nome_orientador;
    public function  __construct($id, $nome_orientador){
        $this->id = $id;        
        $this->nome_orientador = $nome_orientador;        
           
    }
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getNomeOrientador() {
        return $this->nome_orientador;
    }
    public function setNomeOrientador($nome_orientador) {
        $this->nome_orientador = $nome_orientador;       
    }

    public static function TodosOrientadores() {
     
        $banco = new Database();

        $arrayOrientador = array();
        $comandoSQL = "select orientador.orientador_id, nome_orientador from orientador where NOT EXISTS(select * from usuario where usuario.orientador_id = orientador.orientador_id)  ";
        $rsdados = $banco->selecionar($comandoSQL);
     
        while ($linha = $rsdados->fetch(PDO::FETCH_ASSOC)) {
            $orientador = new Orientador($linha['orientador_id'], $linha['nome_orientador']);
            $arrayOrientador[] = $orientador;
        }
       
        return $arrayOrientador;
    }
}
?>