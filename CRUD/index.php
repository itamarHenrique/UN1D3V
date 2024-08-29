<?php

require './conexao/conexao.php';

include './funcao/funcoes.php';

$result = $mysqli->query('SELECT * FROM crud');



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud PHP</title>
    <link rel="stylesheet" href="./styles/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body style="background-color: #F0F0F0">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" >Cadastro de Usuarios</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>


<h2>Lista de Úsuarios</h2>

<table border="1">

    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>
    
    <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <th><?php echo $row['id']; ?></th>
            <th><?php echo $row['nome']; ?></th>
            <th><?php echo $row['email'] ;?></th>
            <th><a href="editar.php?id=<?php echo $row['id']; ?>">Editar</a>
            <a onclick="return confirmarExclusao()" href="delete.php?id=<?php echo $row['id']; ?>">Deletar</a>
            </th>
        </tr>

        <?php endwhile; ?>

</table>

<div class="botao">
    <a href="criar.php"><button style="width: 200px; height: 35px">Adicionar Novo Úsuario</button></a>
</div>

<script>

    function confirmarExclusao(){
        return confirm("Tem certeza que você deseja confirmar essa exclusão?");
    }


</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    
</body>
</html>