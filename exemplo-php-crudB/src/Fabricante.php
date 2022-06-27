<?php 
namespace CrudPoo;
use PDO;

final class Fabricante {
    private int $id;
    private string $nome;

   private PDO $conexao; // Ponte entre a classe Fabricante e a classe Banco. Receberá os recursos do PDO através da classe banco. 

    public function __construct()
    {
        // No momento em que for criado um objeto a partir da classe Fabricante, automaticamente será feita a conexão com o Banco.
        $this->conexao = Banco::conecta();
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