<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem</title>
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
    <h2>Tarefas Cadastradas</h2>
</div>


<div class="container">

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tarefa</th>
      <th scope="col">Data</th>
      <th scope="col">Ação</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <tr>
      <th scope="row"></th>
      <td></td>
      <td></td>
      <td>Excluir</td>
    </tr>
    <tr>
      <th scope="row"</th>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td colspan="2"></td>
      <td></td>
    </tr>
  </tbody>
</table>


</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>