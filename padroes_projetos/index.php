<?php
require_once './controller/itemController.php'; //inclui o arquivo que tem toda a lógica relacionada a listagem 
require_once './database/conexao.php'; //inclui o arquivo que tem a conexão com o banco de dados 
require_once './repository/itemRepository.php'; //inclui o arquivo que contém as interações com o banco de dados

$conexao = new Conexao(); //Cria uma nova instância para a classe conexão   
$conn = $conexao->getConexao(); //Estabelece uma conexão com o banco de dados chamando o método getConexao 

$itemRepository = new ItemRepository($conn); //Cria uma nova instância para a classe ItemRepository, passando a conexão com o banco como argumento            

$itemController = new ItemController($itemRepository); //Passa para a classe itemController o itemRepository pronto para ser usado
$itemController->mostrarListagemProdutos(); //Chama a página de apresentação, fazendo o uso de todas as informações recuperadas de itemRepository
?>