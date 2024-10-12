<!DOCTYPE html>
<html>
    <head>
    <title>Detalhe do produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    </head>
    <body>
        <div class="container">
            <h1>Detalhes do produto: {{$product->nome}}</h1>

        <ul>
            <li>
                <b>Valor: </b> R$ {{$product->preco}};
            </li>
            <li>
                <b>Descrição: </b> {{$product->descricao}}
            </li>
        </ul>

        </div>

    </body>
</html>
