<?php 

require_once "conecta.php";
// função para carregar/ler os dados dos fabricantes
function lerFabricantes(PDO $conexao):array{
    try {
        // code...
// string com o comando SQL
$sql = "SELECT id, nome FROM fabricanteS";
// preparação do comando
$consulta = $conexao->prepare($sql);
 // Execução do comando
$consulta->execute();
//Capturar os resultados
$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC); //Array associativo - transformou o resultado bruto do banco de dados em array
    } catch (Exception $erro) { 
        die ("Erro: ".$erro->getMessage());
    }
   return $resultado;
}

// Inserir um fabricante
function inserirFabricantes(PDO $conexao, string $nome){
    
}