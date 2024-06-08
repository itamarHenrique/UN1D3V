<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<?php

$nomeArquivo = $_POST['titulo'];
$nome = "";
$conteudoArquivo = $_POST['conteudo'];
$conteudo = "";
$checkbox = isset($_POST['checkbox']);

if(empty($nomeArquivo))
{
    
    echo '<div class="container">';
    echo '<div class="alert alert-warning" role="alert">';
    echo ' <p>Nome do arquivo está vazio. Por favor, tente novamente.</p><a href="index.html" class="alert-link">Clique para voltar a pagina inicial</a>.';
    echo '</div>';
    echo '</div>';

    exit();
    
}else if(empty($conteudoArquivo))
{
    echo '<div class="container">';
    echo '<div class="alert alert-warning" role="alert">';
    echo '<p>Campo do contéudo a ser gravado está vazio. Por favor, tente novamente.</p><a href="index.html" class="alert-link">Clique para voltar a pagina inicial</a>.';
    echo '</div>';

    echo '</div>';
    exit();
}
else
{
    echo '<div class="container">';
    echo '<div class="alert alert-success" role="alert">';
    echo '<p>Arquivo gravado com sucesso.</p><a href="index.html" class="alert-link">Clique aqui para voltar a pagina inicial</a>.';
    echo '</div>';
    echo '</div>';
    $nome = $nomeArquivo;
    $conteudo = $conteudoArquivo;
    $conteudo = "{$_POST['conteudo']}";
}


$caminhoArquivo = "C://Downloads/" . $nome . ".txt";



if ($checkbox) {
    if ($nome && $conteudo) {
        file_put_contents($caminhoArquivo, $conteudoArquivo);
    }
}else{
    file_put_contents($caminhoArquivo, $conteudoArquivo, FILE_APPEND);
}



?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</body>

</html>