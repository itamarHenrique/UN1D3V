<?php

// Conexão
require "./funcoes/conexao.php";

include "./funcoes/validacao.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sqlExclusao = "DELETE FROM tarefa WHERE id = ?";
    $statement = $mysqli->prepare($sqlExclusao);
    $statement->bind_param('i', $id);
    $statement->execute();
    $statement->close();
}


$pesquisa = isset($_GET['busca']) ? $_GET['busca'] : '';
$pesquisaValida = strlen($pesquisa) > 3;

if (!empty($pesquisa)) {
    $pesquisaSQL = "%{$pesquisa}%";
    $statement = $mysqli->prepare("SELECT * FROM tarefa WHERE titulo LIKE ?");
    $statement->bind_param('s', $pesquisaSQL);
    $statement->execute();
    $result = $statement->get_result();
    $statement->close();
} else {
    $result = null;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar tarefa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/style.css">

</head>
<body>


<nav class="navbar" style="background-color: #0B7BFF">

<a class="navbar-brand">ToDo list</a>

<ul class="nav justify-content-end">

<li class="nav-item1 opacity-100">
    <a class="nav-link" href="busca.php">Buscar tarefa</a>
</li>

<li class="nav-item1 opacity-100">
    <a class="nav-link" href="index.php">Cadastrar tarefa</a>
</li>
<li class="nav-item opacity-100">
    <a class="nav-link" href="listagem.php">Listar tarefa</a>
</li>
</ul>

</nav>

<div class="container mt-5">
        <label for="buscar_tarefa">
            <h2 class="text-primary fw-semibold">Buscar Tarefas</h2>
        </label>
</div>



<?php if (verificaMetodoGet()) : ?>
    <form action="busca.php" method="get">
                <div class="container mt-5">
                    <div class="col d-flex align-items-center">
                        <input type="text" class="form-control me-2 w-75" id="busca" name="busca" autocomplete="on">
                        <button type="submit" class="btn btn-primary w-25">Buscar Tarefa</button>
                    </div>
                </div>
            </form>
<?php endif; ?>


<div class="container mt-5">
<?php if ($pesquisaValida && isset($result) && $result->num_rows > 0): ?>
    <p class="fw-normal fs-2">Foram encontrados <span class="fw-bold"><?php echo $result->num_rows ?> registros</span> com a palavra-chave <span class="fw-bold">"<?php echo htmlspecialchars($pesquisa) ?>"</span></p>
<?php elseif (!$pesquisaValida && !empty($pesquisa)): ?>
    <div class="alert alert-danger">
        <strong>OPS!!! <br></strong>
        <span>Você precisa informar ao menos 3 caracteres para realizar a sua busca.</span>
    </div>
<?php elseif ($pesquisaValida && isset($result)): ?>
    <div class="alert alert-danger">
        <strong>OPS!!! <br></strong>
        <span>Não foram encontrados registros com a palavra-chave <span class="fw-bold"><?php echo htmlspecialchars($pesquisa) ?></span></span>
    </div>
<?php endif; ?>
</div>


<div class="container mt-5">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tarefa</th>
                <th scope="col">Data</th>
                <th scope="col">Ação</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
        <?php if ($pesquisaValida && isset($result)): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['titulo']); ?></td>
                    <td><?php echo htmlspecialchars($row['datas']); ?></td>
                    <td><a href="listagem.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir essa tarefa?')">Excluir</a></td>
                    </tr>
            <?php endwhile; ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>
   

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>