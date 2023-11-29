<?php
class ItemController 
{
    private $itemRepository; //Cria a variável privada para receber repositório de item 

    function __construct($itemRepository)//Função construtora que recebe o repositório e atribui a propriedade 
    {
        $this->itemRepository = $itemRepository;
    }

    public function mostrarListagemProdutos()//Método que exibe a página de listagem de item 
    {
        $nome = isset($_POST['search']) ? $_POST['search'] : null;// (operador ternário) Verifica se o campo de pesquisa foi preenchido

        if ($nome !== null) {
            $itens = $this->getItensPorNome($nome); //Se houver algum item digitado ele passa por parâmetro o que fo digitado 
        } else {
            $itens = $this->getItens();//Se não ele pesquisa todos os itens 
        }

        include './view/listar_itens.php'; //Depois da pesquisa ele chama a página 
    }

    public function getItens()//Métodos para obter itens do repositório 
    {
        return $this->itemRepository->getItens();
    }

    public function getItensPorNome($nome)//Método para receber itens de acordo com o nome
    {
        return $this->itemRepository->getItensPorNome($nome);
    }
}
?>
