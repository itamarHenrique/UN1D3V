<?php

$hostname = "localhost";
$bancoDeDados = "unidev";
$usuario = "root";
$senha = "";

// Conexão
try {
    $mysqli = new mysqli("localhost", "root", "" , "unidev", 3306);
} catch(Exception $e) {
    echo $e;
    die('Não consegui me conectar nessa bagaça!!!');
}

$statement = $mysqli->prepare("INSERT INTO alunos (nome, sobrenome, email, idade) VALUES (?, ?, ?, ?)");

$nome = $_GET['nome'];
$sobrenome = $_GET['sobrenome'];
$email = $_GET['email'];
$idade = $_GET['idade'];

$statement->bind_param("sssi", $nome, $sobrenome, $email, $idade);

$statement->execute();

// Executar o SQL
$result = $mysqli->query("SELECT alunos.id, alunos.nome, alunos.sobrenome, alunos.email, cursos.nome AS curso FROM alunos LEFT JOIN cursos ON cursos.id = alunos.curso_id");

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de alunos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">

                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>E-mail</th>
                    </tr>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nome']; ?></td>
                        <td><?php echo $row['sobrenome']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </table>

            </div>
        </div>
    </div>

</body>
</html>