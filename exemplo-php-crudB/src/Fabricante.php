<?php 
namespace CrudPoo;
use PDO, Exception;

final class Fabricante {
    private int $id;
    private string $nome;

   private PDO $conexao; // Ponte entre a classe Fabricante e a classe Banco. Receberá os recursos do PDO através da classe banco. 

    public function __construct()
    {
        // No momento em que for criado um objeto a partir da classe Fabricante, automaticamente será feita a conexão com o Banco.
        $this->conexao = Banco::conecta();
    }

        // Ler os dados dos fabricantes
public function lerFabricantes():array {
    $sql = "SELECT id, nome FROM fabricantes ORDER BY nome";
    try {
        $consulta = $this->conexao->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro: ".$erro->getMessage());
    }
    return $resultado; 
}

// Inserir um fabricante
public function inserirFabricante():void {
    /* :qualquer_coisa -> isso é um named parameter */
    $sql = "INSERT INTO fabricantes(nome) VALUES(:nome)";
    try {
        $consulta = $this->conexao->prepare($sql);

        /* bindParam('nome do parametro', $variavel_com_valor, constante de verificação) */
        $consulta->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro: " .$erro->getMessage());
    }
}









    public function getId(): int
    {
        return $this->id;
    }

 
    public function setId(int $id)
    {
        $this->id = $id;

    }

   
    public function getNome(): string
    {
        return $this->nome;
    }


    public function setNome(string $nome)
    {
        $this->nome = $nome;

    
    }
}