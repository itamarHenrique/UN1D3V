<?php


try {

    $mysqli = new mysqli("localhost", "root", "" , "unidev", 3306);
  
  } catch(Exception $e) {
    die('Conexão não realizada!');
}