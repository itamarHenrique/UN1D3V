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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body style="background-color: #F8F9FA">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" >Cadastro de Usuarios</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>

<div class="container d-flex flex-column justify-content-center align-items-center mt-5">

<h2 class="text-center mb-4">Lista de Úsuarios</h2>

<div class="table-responsive w-75">
    <table class="table table-bordered text-center">

    <thead>

        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
    <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nome']; ?></td>
            <td><?php echo $row['email'] ;?></td>
            <td><a href="editar.php?id=<?php echo $row['id']; ?>"><button class="btn btn-light">Editar</button></a>
            <a onclick="return confirmarExclusao()" href="delete.php?id=<?php echo $row['id']; ?>"><button class="btn btn-danger">Deletar</button></a>
            </td>
        </tr>

    <?php endwhile; ?>


    </tbody>

    </table>
</div>

<div class="text-center mt-3">
    <a href="criar.php"><button style="width: 200px; height: 35px">Adicionar Novo Úsuario</button></a>
</div>

</div>


</div>


<script>

    function confirmarExclusao(){
        return confirm("Tem certeza que você deseja confirmar essa exclusão?");
    }


</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    
</body>
</html>