<?php

session_start();

include "./funcoes/validacao.php";


if(!verificaMetodoGet()){
    
    $data = $_POST['data'];
    $titulo = $_POST['titulo'];

    $gravou = false;

    if(validarData($data) && validarEntrada($titulo)){
        $_SESSION["tarefas"][] = [
            "tarefa" => $titulo,
            "data" => $data
        ];
        
        $gravou = true;
    }
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>

<nav class="navbar" style="background-color: #0B7BFF">

<a class="navbar-brand">ToDo list</a>


<ul class="nav justify-content-end">
<li class="nav-item1 opacity-100">
    <a class="nav-link" href="index.php">Cadastrar tarefas</a>
</li>
<li class="nav-item opacity-100">
    <a class="nav-link" href="listagem.php">Listar tarefas</a>
</li>
</ul>

</nav>




<div class="container mt-5">
    <h2>Nova Tarefa</h2>
    
</div>

<?php if (!verificaMetodoGet()) : ?>
    <div class="container mt-5">
        <?php include "./alertas/alertas.php"; ?>
    </div>
<?php endif; ?>

<div class="container mt-5">
<form action="" method="post">
    <div class="mb-3">
        <label for="titulo" class="form-label">Titulo da tarefa</label>
        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ex: Comprar leite">
        </div>
        <div class="mb-3">
        <label for="data" class="form-label">Data da tarefa</label>
        <input type="text" class="form-control" id="data" name="data" placeholder="Ex: 15/07/2024">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar tarefa</button>

    </div>

</form>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>