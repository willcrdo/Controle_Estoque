<?php
	include_once 'database_cliente.php';
	include_once 'cliente.php';
	$database = new Database();
	$db = $database->getConnection();
	$cliente = new Cliente($db);
        $cliente->nomeCli = $_POST['nomeCli'];
        $cliente->endCli = $_POST['endCli'];
        $cliente->numeroEndCli = $_POST['numeroEndCli'];
        $cliente->telCli = $_POST['telCli'];
        $cliente->celCli = $_POST['celCli'];

	if($cliente->cadastroCliente()){
		echo 'Cliente cadastrado com sucesso!';
		echo  "<script>alert('Cliente cadastrado com sucesso!');</script>";
	} else{
		echo 'Nao foi possivel realizar o cadastro.';
		echo  "<script>alert('Erro ao cadastrar cliente!');</script>";
	}
?>