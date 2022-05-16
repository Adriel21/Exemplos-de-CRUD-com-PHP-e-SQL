<?php
/*Script de conexão ao servidor de banco de dados*/

// Parâmetros
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "vendas";

try { //try/catch funciona como uma condicional para erros

// Criando a conexão com o MySQL (API/Driver de conexão)
//mysqli - quando a aplicação é criada somente para o banco mysql
//PDO - PHP DATA OBJECT - Funciona para qualquer banco de dados

$conexao = new PDO( //Qualquer coisa criada com o 'new' é um objeto
"mysql:host=$servidor; dbname=$banco; charset=utf8", 
$usuario, $senha);

// Habilita a verificação de erros de conexão (relacionados ao PDO)
$conexao->setAttribute(PDO::ATTR_ERRMODE, //Constantes de erros em geral
PDO::ERRMODE_EXCEPTION); //Constante de excessões de erro - mensagens mais customizadas - podemos melhorar a qualidade na exibição dos erros - esses erros são úteis durante o processo de desenvolvimento, após a finalização, deve ser desabilitado para não exibir dados do back-end para o usuário final

} catch(Exception $erro){
die("Erro: ".$erro->getMessage()); //A setinha -> funciona como o . no JavaScript para acessar os recursos de um OBJETO
}