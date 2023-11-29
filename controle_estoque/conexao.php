<?php
	$servidor = "127.0.0.1";
	$usuario = "root";
	$senha = "123456789";
	$dbname = "estoque";
	
	
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

	if (!$conn) {
    die('Falha na conexão com o banco de dados: ' . mysqli_connect_error());
	
	}

?>