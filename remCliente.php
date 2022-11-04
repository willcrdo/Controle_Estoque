<?php
	include_once 'database_cliente.php';
	include_once 'cliente.php';
	$database = new Database();
	$db = $database->getConnection();
	$cliente = new Cliente($db);
        $cliente->codCliRem = $_POST['codCliRem'];

	if($cliente->remCliente()){
		echo 'Cliente removido com sucesso!';
	} else{
		echo 'Nao foi possivel remover o cliente.';
	}
?>
