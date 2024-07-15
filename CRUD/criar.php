<?php

require './conexao/conexao.php';

include './funcao/funcoes.php';

if(verificaMetodoPost()){
    $name = $_POST['nome'];
    $email = $_POST['email'];

    $statement = $mysqli->prepare('INSERT INTO crud (nome, email) VALUES (?, ?)');

    $statement->bind_param('ss', $name, $email);

    if($statement->execute()){
        header("Location: index.php");
    }
    $statement->close();


}



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="./styles/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body class="bg-success">


<div class="container">

    <div class="formulario">

        <form method="post">

        <h2>Criar Usuario</h2>

            <label>Nome</label>
            <div class="nome">
                
                <input type="text" id="nome" name="nome" placeholder="Digite o seu nome" required>
            </div>
            

            <label>Email</label>
            <div class="email">
                
                <input type="email" id="email" name="email" placeholder="Digite o email" required>
            </div>
            
            <div class="botao">
                <button type="submit" value="Salvar">Cadastrar</button>
            </div>
            

            </form>

    </div>

</div>
    
</body>
</html>