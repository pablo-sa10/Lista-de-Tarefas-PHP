<?php

class Repositorio{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    private function objeto($dados){
        return new Tarefa(
            $dados['ID'],
            $dados['TAREFA'],
            $dados['DESCRICAO'],
            $dados['INICIO'],
            $dados['FIM']
        );
    }

    public function getTarefas(){
        $sql = "SELECT * FROM tarefas";
        $statement = $this->pdo->query($sql);
        $tarefas = $statement->fetchAll(PDO::FETCH_ASSOC);

        $dadosTarefas = array_map(function($tarefas){
            return $this->objeto($tarefas);
        }, $tarefas);

        return $dadosTarefas;
    }

    public function getAdiciona(Tarefa $tarefa){
        $sql = "INSERT INTO tarefas 
        (TAREFA, DESCRICAO, INICIO, FIM)
        VALUES (?, ?, ?, ?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $tarefa->getTarefa());
        $statement->bindValue(2, $tarefa->getDescricao());
        $statement->bindValue(3, $tarefa->getInicio());
        $statement->bindValue(4, $tarefa->getFim());
        $statement->execute();
    }

    public function getExcluir($tarefa){
        $sql = "DELETE FROM tarefas WHERE ID = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $tarefa, PDO::PARAM_INT);
        $statement->execute();
    } 

    public function getEditar(Tarefa $tarefa){
        $sql = "UPDATE tarefas SET TAREFA = ?, DESCRICAO = ?,
        INICIO = ?, FIM = ? WHERE ID = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $tarefa->getTarefa());
        $statement->bindValue(2, $tarefa->getDescricao());
        $statement->bindValue(3, $tarefa->getInicio());
        $statement->bindValue(4, $tarefa->getFim());
        $statement->execute();
    }
}

?>