<?php

include("conexao.php");

$sql = "SELECT * FROM item";

if (isset($_POST['search'])) {
	$search_term = mysqli_real_escape_string($conn, $_POST['search']);
	$sql .= " WHERE nome LIKE '%{$search_term}%'";	
}

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>

<head>
	<title>Lista de Dados</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

	<style>
		h1{
			text-align: center;
		}

	</style>

</head>

<body style="background-image: url('fundo-azul-do-gradiente-de-luxo-abstrato-liso-azul-escuro-com-vinheta-preta-studio-banner.jpg'); background-size: cover;">
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
			<input type="submit" value="Pesquisar"><br><br>
		</form>

		<!-- Criar uma tabela HTML para exibir os dados -->
		<table class="table table-striped table-bordered table-condensed table-hover">
			<tr >
				<th>Id</th>
				<th>Nome</th>
				<th>Descrição</th>
				<th>Valor Médio</th>
				<th>Estoque Atual</th>
				<th>Família</th>
			</tr>


			<?php while ($row = mysqli_fetch_array($result)) : ?>
				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['nome']; ?></td>
					<td><?php echo $row['descricao']; ?></td>
					<td><?php echo $row['valor']; ?></td>
					<td><?php echo $row['quant_estoque']; ?></td>
					<td><?php echo $row['familia']; ?></td>
				</tr>
			<?php endwhile; ?> 
		</table>
	</div>

</body>

</html>

<?php
mysqli_close($conn);
?>