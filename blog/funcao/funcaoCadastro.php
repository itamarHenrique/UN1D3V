<?php


function validandoEntrada($informacao){
    if(!empty(trim($informacao)) && strlen($informacao) > 4){
        return $informacao;
    }else{
        throw new InvalidArgumentException("Esse dado está incorreto: ". $informacao);
    }
    
}

function validarSenha($senha){
    if(!empty(trim($senha)) && strlen($senha) > 5 && strlen($senha) < 20){
        $senha = password_hash($senha, PASSWORD_DEFAULT);
        return $senha;
    }

    if(strlen($senha) < 5){
        throw new InvalidArgumentException("A senha tem menos que 5 caracteres.");
    }else if(strlen($senha) > 20){
        throw new InvalidArgumentException("A senha tem mais que 20 caracteres");
    }
}