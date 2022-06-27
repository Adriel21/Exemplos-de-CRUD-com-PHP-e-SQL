<?php 
// Recordando que, como será uma classe que não será acessada diretamente, a inserimos como abstract class

namespace CrudPoo;

// Indicando o uso das classes nativas do PHP. Ou seja, classes que não fazem parte do nosso namespace.
use PDO, Exception;

abstract class Banco {
    // O static serve para acessar recursos sem precisar de um objeto
    // Propriedades/atributos de acesso ao servidor de Banco de Dados.
    private static string $servidor = "localhost";
    private static string $usuario = "root";
    private static string $senha = "";
    private static string $banco = "vendas";
    // private static \PDO $conexao = "vendas"; //A barra invertida informa que o tipo PDO não faz parte do namespace. Basicamente, ele fala saia do Namespace e vá até a "raiz" da linguagem. Não precisa do USE PDO
    private static PDO $conexao; // Precisa do USE PDO

    // Método de conexão ao banco
    public static function conecta():PDO {
        try {
             // Criando a conexão com o MySQL (API/Driver de conexão)
    self::$conexao = new PDO(
    "mysql:host=".self::$servidor."; 
    dbname=".self::$banco."; 
    charset=utf8",
    self::$usuario, 
    self::$senha); //Quando queremos utilizar uma propriedade estática da classe, não utilizamos O this, mas sim o SELF. Isso dentro da classe.

    // Habilita a verificação de erros (em geral e exceções)
    self::$conexao->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "ok!"; // Teste
        } catch(Exception $erro) {
            die("Deu ruim: ".$erro->getMessage());
        }
        return self::$conexao;
    }
}

Banco::conecta(); // Teste