<?php

// Conexão
try {

    $mysqli = new mysqli("localhost", "root", "" , "unidev", 3306);

} catch(Exception $e) {
    die('Conexão não realizada!');
}

include "./funcoes/validacao.php";

if (verificaMetodoPost()) {
        $data = $_POST['data-tarefa'];
        $titulo = $_POST['titulo'];
        
        // Adiciona a nova tarefa à sessão
        $_SESSION["tarefas"][] = [
            "tarefa" => $titulo,
            "data" => $data
        ];
}

if (isset($_GET['excluir'])) {
    $posicao = $_GET['excluir'];
    if (isset($_SESSION["tarefas"][$posicao])) {
        unset($_SESSION["tarefas"][$posicao]);
        $_SESSION["tarefas"] = array_values($_SESSION["tarefas"]);
    }
}


$tarefas = isset($_SESSION["tarefas"]) ? $_SESSION["tarefas"] : [];

$pesquisa = isset($_GET['busca']) ? $_GET['busca'] : '';


if(empty($pesquisa)){
    $buscas = [];
}else{
    $buscas = validarBusca($pesquisa, $tarefas);
    $numeroBuscas = count($buscas);
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

<?php if(!estaVazio($buscas)) : ?>

    <p class="fw-normal fs-2">Foram encontrados <span class="fw-bold"><?php echo $numeroBuscas ?> registros</span> com a palavra-chave <span class="fw-bold">"<?php echo $pesquisa?>"</span></p>
<?php endif; ?>


<?php if(validarTamanho($pesquisa)): ?>
    <div class="alert alert-danger">
        <strong>OPS!!!!<br></strong>
        <span>Você precisa informar ao menos 3 caracteres para realizar a sua busca</span>
    </div>
<?php endif; ?>


<?php if(estaVazio($buscas)): ?>

    <div class="alert alert-danger">
        <strong>OPS!!! <br></strong>
        <span>Não foram encontrados registros com a palavra-chave <span class="fw-bold"><?php echo $pesquisa ?></span></span>
    </div>

<?php endif; ?>
</div>


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
        <?php if(!is_null($pesquisa)) : ?>
            <?php if(count($buscas) > 0): ?>
                <?php foreach($buscas as $chave => $busca): ?>
            <tr>
            <th scope="row"><?php echo $chave +1; ?></th>
            <td><?php echo htmlspecialchars($busca["tarefa"]); ?></td>
            <td><?php echo htmlspecialchars($busca["data"]); ?></td>
            <td><button type="button" class="btn btn-danger"><a href="busca.php?excluir=<?php echo $chave; ?>">Excluir</a></button></td>

            </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endif; ?>

    </table>
</div>
   

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>