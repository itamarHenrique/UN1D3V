<?php

function validarEntrada($valor){
    return !empty($valor) && strlen($valor) > 5;
}


function validarData($data, $format = "d/m/Y"){
    $timeZone = new DateTimeZone("America/Bahia");
    $d = DateTime::createFromFormat('d/m/Y', $data, $timeZone);

    if($d && $d ->format($format) == $data){
        return true;
    }else{
        return false;
    }
    

}

function verificaMetodoGet(){
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}