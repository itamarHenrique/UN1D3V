<?php

require './conexao/conexao.php';

include './funcao/funcoes.php';

$id = $_GET['id'];

if(verificaMetodoPost()){
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $statement = $mysqli->prepare("UPDATE crud SET nome ='$nome', email ='$email' WHERE id = ? ");
    $statement->bind_param("i", $id);

    if($statement->execute()){
        header("Location: index.php");
    }else{
        echo "Erro: " . $statement . "<br>" . $statement->error;
    }

    $statement->close();

}


$result = $mysqli->query("SELECT * FROM crud WHERE id = $id");
$row = $result->fetch_assoc();

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="./styles/styles.css">
</head>
<body>


<div class="container">

    <div class="formulario">

        <form method="post">

        <h2>Editar Úsuario</h2>

            <label>Nome</label>
            <div class="nome">
                
                <input type="text" id="nome" name="nome" value="<?php echo $row['nome']; ?>" required>
            </div>
            

            <label>Email</label>
            <div class="email">
                
                <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>"required>
            </div>
            
            <div class="botao">
                <button type="submit" value="Atualizar" onclick="return confirmarEdição()">Editar Úsuario</button>
            </div>
            

            </form>

    </div>

</div>

<script>

    function confirmarEdição(){
        return confirm("Tem certeza que você deseja confirmar essa edição?");
    }


</script>
</body>
</html>