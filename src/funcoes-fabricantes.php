<?php 

require_once "conecta.php";
// função para carregar/ler os dados dos fabricantes
function lerFabricantes(PDO $conexao):array{
    // string com o comando SQL
$sql = "SELECT id, nome FROM fabricantes ORDER BY nome";
    try {
        // code...

// preparação do comando
$consulta = $conexao->prepare($sql);
 // Execução do comando
$consulta->execute();
//Capturar os resultados
$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC); //Array associativo - transformou o resultado bruto do banco de dados em array
    } catch (Exception $erro) {  //O die para toda a aplicação
        die ("Erro: ".$erro->getMessage());
    }
   return $resultado;
}

// Inserir um fabricante
function inserirFabricantes(PDO $conexao, string $nome):void /*void é o tipo de dados que indica que a função não tem retorno*/ {
    // :qualquer_coisa named parameters - o parametro :nome serve para tratar os dados antes de ser inserido
    $sql = "INSERT INTO fabricantes(nome) VALUES(:nome)";
    try{
        // code...
        //bindParam('nome do parametro', $variavel_com_valor, constante de verificação)
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
        $consulta->execute();
    } catch (Exception $erro) {
        die ("Erro: ". $erro->getMessage());
    }
}

function lerUmFabricante(PDO $conexao, int $id):array {
    $sql = "SELECT id, nome FROM fabricantes WHERE id = :id";
    try{
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->execute();
        $resultado = $consulta->fetch (PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro: ". $erro->getMessage());
    }
    return $resultado;
}

function atualizarFabricante(PDO $conexao, int $nome):void { 
    $sql = "UPDATE fabricantes SET nome = :nome WHERE id = :id";
    try{
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
        $consulta->execute();
    } catch (Exception $erro) {
        die ("Erro: ". $erro->getMessage());
    }
}