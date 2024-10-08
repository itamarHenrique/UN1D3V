<?php

function verificaMetodoPost(){
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function estaVazio($informacao){
    if(!empty(trim(($informacao))) && strlen($informacao) >= 3){
        return $informacao;
    }else{
        throw new InvalidArgumentException("Um ou mais campo(s) está vazio!");
    }
}

function validaTamanho($informacao){
    if(strlen($informacao) > 3){
        return $informacao;
    }else{
        return 0;
    }
}
