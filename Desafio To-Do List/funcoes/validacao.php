<?php

function validarEntrada($valor){
    return !empty($valor) && strlen($valor) > 5;
}



function validarData($data, $format = "d/m/Y") {
    $timeZone = new DateTimeZone("America/Bahia");
    $date = DateTime::createFromFormat($format, $data, $timeZone);

    if ($date && $date->format($format) == $data) {
        $hoje = new DateTime('now', $timeZone);
        if ($date >= $hoje) {

            return $date->format("Y-m-d");
        
        }
    }
        
    return false;
}

function verificaMetodoGet(){
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function verificaMetodoPost(){
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function estaVazio($pesquisa){
    return empty($pesquisa);
}

function validarTamanho($pesquisa){
    return strlen($pesquisa) < 3;
}

function validarBusca($busca, $tarefas) {
    $tarefasFiltradas = [];
    $letraMinuscula = strtolower($busca);

    foreach($tarefas as $tarefa){
        if(str_contains(strtolower($tarefa['tarefa']), $letraMinuscula)){
            $tarefasFiltradas[] = $tarefa;
        }
    }
    return $tarefasFiltradas;
}
