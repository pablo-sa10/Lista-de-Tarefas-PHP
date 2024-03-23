<?php

class Conexao{
    private $servidor = "sqlsrv:Server=PABLO;Database=Tarefas";
    private $username = "saa";
    private $senha = "santista10";
    private $conn;

    public function conectar(){
        try{
            $this->conn = new PDo($this->servidor,
                                  $this->username,
                                  $this->senha);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            die("Erro de conexao" . $e->getMessage());
        }
    }

    public function getConexao(){
        if(!$this->conn){
            $this->conectar();
        }
        return $this->conn;
    }
}
?>