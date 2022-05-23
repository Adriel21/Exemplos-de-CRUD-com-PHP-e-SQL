<?php

require_once "conecta.php";

function lerProdutos(PDO $conexao):array {
    $sql = "SELECT id, nome, descricao, preco, quantidade FROM produtos ORDER BY nome";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die ("Erro: ".$erro->getMessage());
    }
    return $resultado;
}