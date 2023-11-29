<?php
class Conexao //Cria a classe que tem toda a movimentação para conexão com o banco
{
    //Inicializa propriedades que contém configuraçãoes para a conexão ativa
    private $servidor = "127.0.0.1"; 
    private $usuario = "root";
    private $senha = "";
    private $dbname = "estoque";
    private $conn;//Armazena a conexão ativa 

    public function getConexao() //Método que inicializa a conexão 
    {
        $this->conn = null; //Atribui a conexão um valor nulo 

        try { 
            //Tenta estabelecer a conexão com o banco de dados 
            $this->conn = new mysqli($this->servidor, $this->usuario, $this->senha, $this->dbname); //Extensão do Mysqli que fornece a instância para interação com o banco
        } catch (mysqli_sql_exception $exception) { //Se houver algum erro ele retorna o erro (capitura excessões na conexão com o banco)
            echo "Erro na conexão: " . $exception->getMessage();
        }

        return $this->conn; //Retorna para a propriedade conn o resultado da conexão 
    }
}
?>