<?php
//require_once('./Core/Banco/Conexao.php');

// altera a classe pra colocar o tipo de animal

class Animal
{
    private $nome;
    private $quantidade_de_patas;
    private $tipo_animal;
    private $conexao;
    public function __construct(Conexao $conexao)
    {
        $this->conexao = $conexao;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setQuantidadePatas($patas)
    {
        $this->quantidade_de_patas = $patas;
    }

    public function setTipo($tipo)
    {
        $this->tipo_animal = $tipo;
    }

    public function exibeAnimal()
    {
        echo "{$this->nome} possui {$this->quantidade_de_patas} patas <br> tipo: {$this->tipo_animal}";
    }

    /**
     * retorna todas as informacoes da tabela animal
     */

    public function getAll()
    {
        $sql = "SELECT * FROM animal";
        $resultado = $this->conexao->query($sql);

        echo "<table>";
        foreach ($resultado as $key => $linha) {

            echo "<tr>";
            echo "<td> Id: {$linha['id']} </td>";
            echo "<td> Nome: {$linha['nome']} </td>";
            echo "<td> Patas: {$linha['quantidade_de_patas']} </td>";
            echo "<td> Tipo: {$linha['tipo_animal']} </td>";
            echo "<td>
         <a href='./index.php?editar={$linha['id']}'>Editar</a>
         <a href='./index.php?excluir={$linha['id']}'>Excluir</a>
         </td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    public function getById($id)
    {
        $sql = "Select * FROM animal WHERE id = {$id}";
        $resultado = $this->conexao->query($sql)->fetch();

        if ($resultado === false) {
            echo "Animal não foi encontrado";
        } else {
            echo "Dados da pesquisa <br>";
            echo "Id: {$resultado['id']} - Nome: {$resultado['nome']} -
             Patas: {$resultado['quantidade_de_patas']} - Tipo: {$resultado['tipo_animal']}";
        }


    }
    public function destroy($id)
    {

        $sql = "DELETE FROM animal WHERE id = {$id}";

        $this->conexao->query($sql);

    }

    public function incluir(){

        $sql = "INSERT INTO (nome, patas, tipo)

            VALUES ($this->nome}', {$this->quantidade_de_patas},

            '{$this->tipo_animal}')";

        $this->conexao->query($sql);

    }

}
