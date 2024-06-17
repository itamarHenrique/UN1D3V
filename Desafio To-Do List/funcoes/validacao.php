<?php

function validarEntrada($valor){
    return !empty($valor) && strlen($valor) > 5;
}



function validarData($data, $format = "d/m/Y"){
    $timeZone = new DateTimeZone("America/Bahia");
    $d = DateTime::createFromFormat('d/m/Y', $data, $timeZone);

    if($d && $d ->format($format) == $data){
        return true;
    }
        
    return false;
    

}

function verificaMetodoGet(){
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function verificaMetodoPost(){
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}


function validarTamanhoBusca($tarefa){
    return strlen($tarefa) > 3;
}

function estaVazioBusca($tarefa){
    return empty($tarefa);
}

function validarBusca($busca, $tarefas) {
    $tarefasFiltradas = [];
    $letraMinuscula = strtolower($busca);

    foreach($tarefas as $tarefa){
        if(str_contains($tarefa['tarefa'], $letraMinuscula)){
            $tarefasFiltradas[] = $tarefa;
        }
    }
    return $tarefasFiltradas;
}
