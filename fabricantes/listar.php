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
    <title>Fabricantes</title>
</head>
<body>
    <div class="container">
        <h1>Fabricantes | SELECT</h1>
        <hr>
        <h2>Lendo e carregando todos os fabricantes</h2>
        <p>
            <a href="inserir.php"></a>
            Inserir novo fabricante
        </p>

        <?php //if( isset($_GET['sucesso']) ){ 
            if(isset($_GET['status']) && ($_GET['status'] == 'sucesso')) {?>

        <p>Fabricante atualizado com sucesso !</p>
        <?php }?>
        <table>
            <caption>Lista de fabricantes</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th colspan="2">Operações</th>
                    <!-- colspan funciona como uma mesclagem do exel, retira a linha vertical divisória -->
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

                        <td id="fab"><?=$fabricante['nome']?></td>
                        <td><a href="atualizar.php?id=<?=$fabricante['id']?>">Atualizar</a></td> <!--Parametro de url para criação de link dinâmico-->
                        <td><a href= "excluir.php?id=<?=$fabricante['id']?>" class="excluir">Excluir</a ></td>
                        <!-- onclick="return confirm('Deseja excluir?')" -->
                    </tr>
                  <?php } ?>
                
            </tbody>
        </table>
    </div>

    <script>
        //Acessando todos os links com a classe excluir
        const links = document.querySelectorAll('.excluir');

        for(let i = 0; i < links.length; i++){
            links[i].addEventListener("click", function(event){
                event.preventDefault();
                
                let resposta = confirm("Deseja realmente excluir?");

                if(resposta) location.href = links[i].getAttribute("href");
                
            });
        }

      
          
       
    </script>
    <a href="..//fabricantes/inserir.php">Ir</a>
        <script src="../seguranca.php"></script>
</body>
</html>