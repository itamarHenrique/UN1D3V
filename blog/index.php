<?php

require './conexao/conexao.php';


include './funcao/funcaoGlobal.php';
include './funcao/funcaoCadastro.php';

if(isset($_POST['email'])){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $result = $mysqli->query("SELECT * FROM usuario WHERE email = '$email'");
    
    $usuario = $result->fetch_assoc();
    if(password_verify($senha, $usuario['senha'])){
        echo 'Usuario logado.';
    }else{
        echo 'Falha ao logar';
    }
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