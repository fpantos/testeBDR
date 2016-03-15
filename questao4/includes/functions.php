<?php

function dbConnect() {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "testedbr";

    $db = new mysqli($host, $user, $pass, $database);
    if($db->connect_errno > 0){
        die('Unable to connect to database [' . $db->connect_error . ']');
    }
    return $db;
}

function queryTarefas() {
    $db = dbConnect();
    $query = "SELECT * 
            FROM tarefas  
            ORDER BY prioridade";
    //return mysql_query($query, $connection);
    if(!$result = $db->query($query)){
        die('There was an error running the query [' . $db->error . ']');
    }
    return $result;
}

function insertTarefa($titulo, $descricao, $prioridade) {
    $db = dbConnect();
    $query = "INSERT INTO tarefas (titulo, descricao, prioridade)
            VALUES (?, ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param('ssi', $titulo, $descricao, $prioridade);
    $stmt->execute();

    $stmt->close();
    $db->close();
}

function updateTarefa($id, $titulo, $descricao, $prioridade) {
    $db = dbConnect();
    $query = "UPDATE tarefas 
            SET titulo=?, descricao=?, prioridade=?
            WHERE id={$id}";
    $stmt = $db->prepare($query);
    $stmt->bind_param('ssi', $titulo, $descricao, $prioridade);
    $stmt->execute();

    $stmt->close();
    $db->close();
}

function deleteTarefa($id) {
    $db = dbConnect();

    $query = "DELETE FROM tarefas 
            WHERE ID={$id}";
    if(!$result = $db->query($query)){
        die('There was an error running the query [' . $db->error . ']');
    }

    $db->close();
}

function getTarefa($id) {
    $db = dbConnect();

    $query = "SELECT * 
            FROM tarefas  
            WHERE id = {$id}";

    if(!$result = $db->query($query)){
        die('There was an error running the query [' . $db->error . ']');
    }
    return $result;
}
