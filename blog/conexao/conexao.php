<?php

try{
    $mysqli = new mysqli("localhost", "root", "", "blog", 3306);

}catch(Exception $e){
    echo "Conexão não realizada.\nErro: ". $e->getMessage();
}