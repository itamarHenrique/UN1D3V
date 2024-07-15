<?php

require './conexao/conexao.php';

if($_GET['id']){
    $id = $_GET['id'];
    $sqlExclusao = "DELETE FROM crud WHERE id = ?";
    $statement = $mysqli->prepare($sqlExclusao);
    $statement->bind_param("i", $id);
    
    if($statement->execute()){
        header("Location: index.php");
        $statement->close();
    }
}