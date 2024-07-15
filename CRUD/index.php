<?php

require './conexao/conexao.php';




?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="./styles/styles.css">
    
</head>
<body>


<div class="container">



<div class="formulario">

<form method="post">

<h2>Criar Usuario</h2>
    <div class="nome">
        <label>Nome</label>
        <input type="text" id="nome" name="nome" placeholder="Digite o seu nome">
    </div>
    

    <div class="email">
        <label>Email</label>
        <input type="text" id="nome" name="nome" placeholder="Digite o email">
    </div>
    
    <div class="botao">
        <button type="submit" value="Salvar">Cadastrar</button>
    </div>
    

    </form>

</div>

</div>
    
</body>
</html>