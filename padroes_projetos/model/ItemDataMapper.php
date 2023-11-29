<?php

require_once './model/item.php'; 

class ItemDataMapper //Classe que tem um array assosiativo que contem dados do item 
{
    public static function map(array $data): Item //Define o método público map, que aceita um array associatovo $data como parâmetro e retorna o objeto da classe Item
    {
        // Substitui vírgula por ponto no valor
        $data['valor'] = str_replace('.', ',', $data['valor']);//Substitui as vígulas por pontos 

        return new Item( //Atribuindo os valores a classe Item 
            $data['id'],
            $data['nome'],
            $data['descricao'],
            $data['valor'],
            $data['quant_estoque'],
            $data['familia']
        );
    }
}

?>
