<?php

class Conexao
{
    private $host;
    private $db_name;
    private $db_password;
    private $db_user;

    private $pdo;
    /**
     * Metodo construtor é chamado sempre que criamos um objeto.
     */
    public function __construct($host, $user, $password, $name)
    {
        $this->host = $host;
        $this->db_user = $user;
        $this->db_password = $password;
        $this->db_name = $name;

        $this->conectar();
    }

    private function conectar()
    {
        try {
            $this->pdo = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name}",
                $this->db_user,
                $this->db_password
            );
            print("Link com o banco criado com sucesso!");
        } catch (\Exception $e) {
            print("Error!: " . $e->getMessage() . "<br/>");
            die();
        }
    }
    /*
     * Executa as consultas no banco de dados
     * e devolve a resposta do banco
     */
    public function query($sql)
    {
        return $this->pdo->query($sql);
    }
}