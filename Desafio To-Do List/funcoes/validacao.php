<?php

function validarEntrada($valor){
    return !empty($valor) && strlen($valor) > 5;
}


function validarData($data, $format = "d/m/Y"){
    $date = DateTime::createFromFormat($format, $data);
    return $date && $date ->format($format) == $data;

}

function verificaMetodoGet(){
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}