<?php
require_once './model/ItemDataMapper.php'; //inclui o arquivo que contém os dados de item 

class ItemRepository //cria a classe que tem toda a interação com o banco de dados
{
    private $conexao; 

    function __construct($conexao) //Função construtora que recebe a conexão como parâmetro
    {
        $this->conexao = $conexao;
    }

    public function getItens() //Função que pega os dados de todos os items 
    {
        $sql = "SELECT * FROM item"; //Seleciona todos os itens no banco de dados 
        $resultado = mysqli_query($this->conexao, $sql); // Executa a consulta e pega o resultado 

        if ($resultado === false) { // Verifica se houve algum erro e retorna o erro ao usuário
            throw new Exception('Erro na consulta: ' . mysqli_error($this->conexao));
        }

        if (mysqli_num_rows($resultado) > 0) { //Verifica se pelo menos um resultado foi encontrado
            while ($row = mysqli_fetch_assoc($resultado)) { //Percorre cada linha do resultado e retorna um array associativo
                $itemData = $row; //Guarda as linhas provisoriamente 
                $item = $this->mapArrayToItem($itemData); //Transforma as linhas em objeto de item 
                yield $item; //Trata os objetos um de cada vez 
            }
        } else {
            echo("<script>window.alert('Nenhum Item encontrado')</script>"); //Caso não seja encontrado nenhum, é retornado a informação
        }
    }

    public function getItensPorNome($nome) //Função que busca itens por nome 
    {
        $sql = "SELECT * FROM item WHERE nome LIKE ?"; //Seleciona itens que tem as iniciais ou finais parecidas com que foi escrito 
        $stmt = mysqli_prepare($this->conexao, $sql); // Prepara a consulta no SQL

        $nome = '%' . $nome . '%';// Adiciona as % antes e depois do nome para pesquisa
        mysqli_stmt_bind_param($stmt, 's', $nome);

        mysqli_stmt_execute($stmt);//Executa a consulta preparada 
        $resultado = mysqli_stmt_get_result($stmt);//Obtém o resultado da consulta 

        if ($resultado === false) {
            throw new Exception('Erro na consulta: ' . mysqli_error($this->conexao)); //Verifica se houve erro na consulta 
        }

        if (mysqli_num_rows($resultado) > 0) { //Se houver mais de um resultado ele entra no if 
            while ($row = mysqli_fetch_assoc($resultado)) {//Percorre cada linha e coloca em um array associativo 
                $itemData = $row; //Guarda as linhas provisoriamente 
                $item = $this->mapArrayToItem($itemData); //Transforma as linhas no objeto item 
                yield $item; //Trata os objetos um de cada vez
            }
        } else {
            echo("<script>window.alert('Nenhum Item encontrado')</script>"); 
        }
    }

    // Passando como parâmetro $itemData e a função estabelecendo um array associativo retornando o objeto Item
    private function mapArrayToItem(array $itemData): Item //Preenche os dados do objeto item de acordo com o $itemData
    {
        return new Item( //Preenche os atributos de acordo com o resultado do array associativo
            $itemData['id'],
            $itemData['nome'],
            $itemData['descricao'],
            $itemData['valor'],
            $itemData['quant_estoque'],
            $itemData['familia']
        );
    }
}
?>

