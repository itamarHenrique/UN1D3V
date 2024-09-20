<?php

function verificaMetodoPost(){
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}
