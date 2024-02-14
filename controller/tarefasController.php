<?php

require_once "../model/Tarefa.php";
class TarefaController{
    
    public function getAdiciona($tarefa, $descricao, $fim){
        // var_dump([$tarefa, $descricao, $fim]); exit;
        return (new Tarefa)->getAdiciona($tarefa, $descricao, $fim);
    }

    public function getTarefas(){
        return (new Tarefa)->getTarefas();
    }

    public function getIdTarefa($id){
        return (new Tarefa)->getIdTarefas($id);
    }

    public function getEdita($id, $tarefa, $descricao, $inicio, $fim){
        return (new Tarefa)->getEdita($id, $tarefa, $descricao, $inicio, $fim);
    }

    public function getExcluir(){
        $id = $_GET['id'];
        $result = (new Tarefa)->getExcluir($id);
        echo json_decode($result);
    }

    /* public function getTarefas(){
        $sql = "SELECT * FROM tarefas";
        $statement = $this->pdo->query($sql);
        $tarefas = $statement->fetchAll(PDO::FETCH_ASSOC);

        $dadosTarefas = array_map(function($tarefas){
            return $this->objeto($tarefas);
        }, $tarefas);

        return $dadosTarefas;
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
    } */
}

?>