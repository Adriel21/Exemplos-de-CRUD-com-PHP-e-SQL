<?php 

if( isset($_POST['inserir']) ){
    require_once '../src/funcoes-produtos.php'
    
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserindo produto</title>
</head>
<body>
<div class="container">
        <h1> Produtos | INSERT</h1>
        <hr>
      
        <form action="" method="post">
            <p>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome">
            </p>
            <button type="submit" name="inserir">
                Inserir produto
            </button>
        </form>
        <p><a href="../fabricantes/listar.php">Voltar</a></p>
    </div>
    
</body>
</html>