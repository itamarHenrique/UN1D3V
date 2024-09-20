<?php

require './conexao/conexao.php';

include './funcao/funcaoGlobal.php';
include './funcao/funcaoCadastro.php';

if(verificaMetodoPost()){
    try{
        $user = validandoEntrada($_POST['usuario']);
        $email = validandoEntrada($_POST['email']);
        $senha = validarSenha($_POST['senha']);

        $statement = $mysqli->prepare('INSERT INTO usuario (email, nome, senha) VALUES (?, ?, ?)');

        $statement->bind_param('sss', $email, $user, $senha);

        if($statement->execute()){
            header('Location: index.php');
        }

    }catch(mysqli_sql_exception $e){
        echo '' . $e->getMessage();
    }
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>

    <form method="post">

    <input type="text" id="usuario" name="usuario" placeholder="User">
    <input type="text" id="email" name="email" placeholder="email@email.com">
    <input type="password" id="senha" name="senha" placeholder="password">

    <button type="submit" value="Salvar">Cadastrar</button>

    </form>
    
</body>
</html>