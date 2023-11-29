<html>

<head>
    <title>Lista de Dados</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Controle de Estoque</a>
        </div>
    </nav><br>
    <h1>Lista de Dados</h1><br>
    <div class="container">
        <form method="post">
            <label for="search">Pesquisar por nome:</label>
            <input type="text" name="search" id="search">
            <input type="submit" value="Pesquisar">
        </form>

        <table class="table table-striped table-bordered table-condensed table-hover">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Valor Médio</th>
                <th>Estoque Atual</th>
                <th>Família</th>
            </tr>

            <?php foreach ($itens as $item): ?> 
                <tr>
                    <td>
                        <?php echo $item->getId(); ?> 
                    </td>
                    <td>
                        <?php echo $item->getNome(); ?>
                    </td>
                    <td>
                        <?php echo $item->getDescricao(); ?>
                    </td>
                    <td>
                        <?php echo $item->getValor(); ?>
                    </td>
                    <td>
                        <?php echo $item->getQuantEstoque(); ?>
                    </td>
                    <td>
                        <?php echo $item->getFamilia(); ?>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>
    </div>
</body>

</html>
