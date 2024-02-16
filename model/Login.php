<?php

require_once "conexao.php";

class Login
{
    private $id;
    private $email;
    private $senha;

    public function __construct($id = NULL, $email = "", $senha = "")
    {
        $this->id = $id;
        $this->email = $email;
        $this->senha = $senha;
    }

    public function getLogin($email, $senha)
    {
        $db = new Conexao();
        $db = $db->getConexao();

        try {
            $sql = "SELECT * FROM usuarios
                    WHERE email = :email --AND senha = :senha";

            $busca = $db->prepare($sql);

            $busca->bindValue(':email', $email, PDO::PARAM_STR);
            //$busca->bindValue(':senha', $senha, PDO::PARAM_STR);
            $busca->execute();

            $resultado = $busca->fetch(PDO::FETCH_ASSOC);
            $senhaCorreta = password_verify($senha, $resultado['senha']);
            $busca->closeCursor();

        } catch (PDOException $ex) {
            echo "erro";
            exit;
        }
        if($senhaCorreta){
            return $senhaCorreta;
        }
        else{
            echo "errou a senha";
            exit;
        }
    }

    public function getCadastro($nome, $email, $senha){
        $db = new Conexao();
        $db = $db->getConexao();

        try{
            $sql = "INSERT INTO usuarios (nome, email, senha) 
            VALUES (:nome, :email, :senha)";

            $busca = $db->prepare($sql);
            $busca->bindValue(':nome', $nome, PDO::PARAM_STR);
            $busca->bindValue(':email', $email, PDO::PARAM_STR);
            $busca->bindValue(':senha', $senha, PDO::PARAM_STR);
            $busca->execute();

            $resultado = $db->lastInsertId();
            $busca->closeCursor();

        }catch(PDOException $ex){
            echo "erro";
            exit; 
        }
        return $resultado;
    }
}
