<?php 
require_once "../src/funcoes-fabricantes.php";

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

excluirFabricante($conexao, $id); //não precisamos colocar numa variável porque não vamos retornar dados

header('location:listar.php');

