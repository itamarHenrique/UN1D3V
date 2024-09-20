<?php

require './conexao/conexao.php';


include './funcao/funcaoGlobal.php';
include './funcao/funcaoCadastro.php';

if(verificaMetodoPost()){
}


?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orkut</title>
</head>
<body>

<div class="container">
    <form method="post">

    <input type="text" id="email" name="email" placeholder="email@email.com">
    <input type="password" id="senha" name="senha" placeholder="password">
    <br><button type="submit">Entrar</button>

    
    </form>

    <a href="cadastrar.php"> <button>Cadastrar</button></a>
</div>
    
</body>
</html>