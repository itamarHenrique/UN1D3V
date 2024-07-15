<?php

try{

    $mysqli = new mysqli("localhost", "root", "", "crud", 3306);
    
}catch(Exception $e){
    die('Conexão não realizada');
}



?>