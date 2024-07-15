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
</head>
<body>

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
            <a href="delete.php?id=<?php echo $row['id']; ?>">Deletar</a>
            </th>
        </tr>

        <?php endwhile; ?>

</table>

<div class="botao">
    <a href="criar.php"><button style="width: 200px; height: 35px">Adicionar Novo Úsuario</button></a>
</div>
    
</body>
</html>