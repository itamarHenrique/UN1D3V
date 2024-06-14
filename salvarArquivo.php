<?php

$resposta = "";

function baianes($palavra){
    $termosLaEle = [
        "caruru" => "carurivs",
        "umbu" => "umbivs"
    ];

    foreach($termosLaEle as $chave => $valor){
        if(in_array(strtolower($palavra), $termosLaEle)){
            return $valor;
        }else{
            return $chave;
        }
    }
}

if(count($_GET) > 0){
    $resposta .= "Nome: {$_GET['nome']}\n";
    $resposta .= "Email: {$_GET['email']}\n";
    $resposta .= "Prato favorito: {$_GET['prato']}";
}

echo nl2br($resposta);

file_put_contents("Arquivo", "$resposta");