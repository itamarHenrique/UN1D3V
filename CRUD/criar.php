<?php

require './conexao/conexao.php';

include './funcao/funcoes.php';

$erro = '';



if(verificaMetodoPost()){
    try{
        $name = estaVazio($_POST['nome']);
        $email = estaVazio($_POST['email']);

        $statement = $mysqli->prepare('INSERT INTO crud (nome, email) VALUES (?, ?)');

        $statement->bind_param('ss', $name, $email);

        if($statement->execute()){
            header("Location: index.php");
        }
        $statement->close();
    }catch(Exception $error){
        //echo "Erro: " . $error->getMessage();
        $erro = $error->getMessage();

    }
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
<body style="background-color: #F0F0F0">

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" >Criação de Usuarios</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Cadastro de Usuarios</a>
        </li>
      </ul>
  </div>
</nav>


<div class="container">

    <div class="formulario">
        
        <?php if($erro): ?>
            <div class="erro"><?php echo htmlspecialchars($erro); ?></div>
        <?php endif; ?>
        

        <form method="post">

        <h2>Criar Usuario</h2>

            <label>Nome</label>
            <div class="nome">
                
                <input type="text" id="nome" name="nome" placeholder="Digite o seu nome">
            </div>
            

            <label>Email</label>
            <div class="email">
                
                <input type="email" id="email" name="email" placeholder="Digite o email">
            </div>
            
            <div class="botao">
                <button type="submit" value="Salvar">Cadastrar</button>
            </div>
            

            </form>

    </div>

</div>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>