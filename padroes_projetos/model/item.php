<?php
class Item //define uma classe chamada 'Item'
{
    //declara variáveis privadas que serão usadas para armazenar informações sobre um item
    private $id;
    private $nome;
    private $descricao;
    private $valor;
    private $quant_estoque;
    private $familia;

    //define o construtor da classe, que é uma função especial que é chamada automaticamente quando um objeto desta classe é criado
    function __construct($id, $nome, $descricao, $valor, $quant_estoque, $familia)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->valor = $valor;
        $this->quant_estoque = $quant_estoque;
        $this->familia = $familia;
    }


    public function getId() //Funções públicas para que os dados de item possam serem manipulados
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function getQuantEstoque()
    {
        return $this->quant_estoque;
    }

    public function getFamilia()
    {
        return $this->familia;
    }
}
?>
