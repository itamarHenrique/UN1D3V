<?php

require './conexao/conexao.php';

include './funcao/funcoes.php';

$id = $_GET['id'];

if(verificaMetodoPost()){
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $statement = $mysqli->prepare("UPDATE crud SET nome ='$nome', email ='$email' WHERE id = ? ");
    $statement->bind_param("i", $id);

    if($statement->execute()){
        header("Location: index.php");
    }else{
        echo "Erro: " . $statement . "<br>" . $statement->error;
    }

    $statement->close();

}


$result = $mysqli->query("SELECT * FROM crud WHERE id = $id");
$row = $result->fetch_assoc();

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="./styles/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body style="background-color: #F0F0F0">

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" >Editar Usuario</a>
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
  </div>
</nav>

<div class="container">

    <div class="formulario">

        <form method="post">

        <h2>Editar Úsuario</h2>

            <label>Nome</label>
            <div class="nome">
                
                <input type="text" id="nome" name="nome" value="<?php echo $row['nome']; ?>" required>
            </div>
            

            <label>Email</label>
            <div class="email">
                
                <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>"required>
            </div>
            
            <div class="botao">
                <button type="submit" value="Atualizar" onclick="return confirmarEdição()">Editar Úsuario</button>
            </div>
            

            </form>

    </div>

</div>

<script>

    function confirmarEdição(){
        return confirm("Tem certeza que você deseja confirmar essa edição?");
    }


</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>