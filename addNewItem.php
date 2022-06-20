<?php
	include_once 'database_estoque.php';
	include_once 'peca.php';
	$alerta = 0;
	$database = new Database();
	$db = $database->getConnection();
	$item = new Peca($db);
        $item->codPeca = $_POST['codPeca'];
        $item->nomePeca = $_POST['nomePeca'];
        $item->descPeca = $_POST['descPeca'];
        $item->qtdPeca = $_POST['qtdPeca'];

	if($item->cadastroPeca()){
		echo 'Peça cadastrada com sucesso!';
		echo  "<script>alert('Peça cadastrada com sucesso!');</script>";
	} else{
		echo 'Nao foi possivel realizar o cadastro.';
		echo  "<script>alert('Erro ao cadastrar peça!');</script>";
	}
?>