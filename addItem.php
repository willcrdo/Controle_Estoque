<?php
	include_once 'database_estoque.php';
	include_once 'peca.php';
	$database = new Database();
	$db = $database->getConnection();
	$item = new Peca($db);
        $item->codPeca = $_POST['codPecaAdd'];
        $item->qtdPeca = $_POST['qtdPecaAdd'];

	if($item->addItem()){
		echo 'Quantidade adicionada com sucesso!';
	} else{
		echo 'Nao foi possivel adicionar o item.';
	}
?>