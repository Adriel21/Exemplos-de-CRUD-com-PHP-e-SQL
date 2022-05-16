<?php
// require_once "..//src/conecta.php" //include, se houver algum problema na operação ele não irá parar a aplicação, enquanto o require irá parar até ser resolvido
// var_dump($conexao); // teste
require_once "..//src/funcoes-fabricantes.php";
$listaDeFabricantes = lerFabricantes($conexao); // Quando a função for chamada, é quando ela irá se conectar com o servidor?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Fabricantes | SELECT</h1>
        <hr>
        <h2>Lendo e carregando todos os fabricantes</h2>

        <table>
            <caption>Lista de fabricantes</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // echo "<pre>";
                // VAR_DUMP($resultado); //teste
                // echo "</pre>"

                 foreach($listaDeFabricantes as $fabricante) { 
                    //echo $fabricante['nome'];?>
                    <tr>
                        <td><?=$fabricante['id']?></td> 

                        <td><?=$fabricante['nome']?></td>
                    </tr>
                  <?php } ?>
                
            </tbody>
        </table>
    </div>
    <a href="..//fabricantes/inserir.php">Ir</a>
</body>
</html>