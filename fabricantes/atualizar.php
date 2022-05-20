<?php 
require_once '../src/funcoes-fabricantes.php';

    //Obtendo o valor do parâmetro da URL
    // $id = $_GET['id'];
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); //usamos o 'id' porque puxamos o parametro da URL
    // echo $id;

    $fabricante = lerUmFabricante($conexao, $id);

    if(isset($_POST['atualizar'])) {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);

        atualizarFabricante($conexao, $id, $nome);
        // Mensagem + refresh
      // header("Refresh:3; url=listar.php"); //header serve para redirecionamento para a página
       // echo "<p>Fabricante atualizado com sucesso</p>";
       header("location:listar.php?status=sucesso");
    }
?>
<!-- <pre><?=var_dump($fabricante)?></pre> -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Atualizar</title>
</head>
<body>
    <div class="container">
        <h1>Fabricantes | SELECT/UPDATE</h1>
        <hr>
      
        <form action="" method="post">
            <input type="hidden" name="<?=$fabricante['id']?>"> <!-- Pesquisar sobre campos ocultos -->
            <p>
                <label for="nome">Nome:</label>
                <input value="<?=$fabricante['nome']?>"type="text" name="nome" id="nome">
            </p>
            <button type="submit" name="atualizar">
                atualizar fabricante
            </button>
        </form>
        <p><a href="../fabricantes/listar.php">Voltar</a></p>
    </div>
</body>
</html>