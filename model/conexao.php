<?php

class Conexao{
    private $servidor = "sqlsrv:Server=TAR221\\TARAMPS;Database=tarefas";
    private $username = "sa";
    private $senha = "@TAR2023";
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