<?php 
require_once "..//src/funcoes-produtos.php";

$ListaDeProdutos = lerProdutos($conexao);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <style>
        table, td{
            border: 2px solid black;
            text-align: center;
        }


    </style>
</head>
<body>
    <h1>Produtos | Select</h1>
    <hr>
    <h2>Lendo e carregando todos os produtos</h2>
    <a href="../produtos/inserir.php"></a>
    <p>
        <a href="inserir.php"></a>
        inserindo novo produto
    </p>

    <table>
        <caption>Lista de produtos</caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Produto</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Quantidade</th>
            </tr>
        </thead>
        <tbody>
            <?php 

            foreach ($ListaDeProdutos as $produto) {
                ?>
                <tr>
                    <td><?=$produto['id']?></td>
                    <td><?=$produto['nome']?></td>
                    <td><?=$produto['descricao']?></td>
                    <td>R$ <?=$produto['preco']?></td>
                    <td><?=$produto['quantidade']?></td>
                    <!-- <td><//?=$produto['fabricante_id']?></td> -->
                    <td><a href="atualizar-produto.php?=<?=$produto['id']?>">Atualizar</a></td>
                    <td>Excluir</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <a href="inserir.php">Ir</a>
</body>
</html>