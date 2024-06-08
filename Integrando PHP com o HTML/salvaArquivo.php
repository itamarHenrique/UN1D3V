<?php



/*$exibirNome = true;
function deveExibirNome($nome, $sobrenome)
{

    $nomeCompleto = dizerNomeCompleto("$nome", "$sobrenome");

    return strlen($nomeCompleto) > 5;
}

function dizerNomeCompleto($nome, $sobrenome) #Retorna uma string
{
    return $nome . " " . $sobrenome;
}



$nome = "Itamar";
$sobrenome = "Henrique";

$participantes = ["Henrique",
 "Pablo",
  "Andrei",
   "Jackson",
    "Iolanda",
     "Michel",
      "Tifani",
       "Isabela",
        "Elder"];


function filtrarNomesPeloTamanho($listaDeNomes, $tamanho = 5)
{
    $novaLista = [];
    foreach($listaDeNomes as $nome){
        if(strlen($nome) <= $tamanho){
            $novaLista[] = $nome;
        }    
    }
    return $novaLista;
}*/
?>
<!--<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha primeira aplicação com PHP</title>
</head>
<body>
    <!--<?php if($exibirNome == true){ ?>
    <h1>Bem vindo ao site de <?php dizerNomeCompleto("Itamar", "Henrique")?>!</h1>
    <?php } ?>-->

    <!--<?php if(deveExibirNome($nome, $sobrenome)): ?>
    <h1>Bem vindo ao site de <?php echo dizerNomeCompleto($nome, $sobrenome)?>!</h1>
    <?php endif ?>



    <h1>Bem vindo ao UN1D3V</h1>
    <H2>Aqui estão os participantes do UN1D3V</H2>
    <ul>
        <?php foreach(filtrarNomesPeloTamanho($participantes, 5) as $participante): ?>
        <li><?php echo $participante; ?></li>
        <?php endforeach ?>
    </ul>
    

</body>
</html>-->
