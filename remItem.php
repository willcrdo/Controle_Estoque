<?php
	include_once 'database_estoque.php';
	include_once 'peca.php';
	$database = new Database();
	$db = $database->getConnection();
	$item = new Peca($db);
        $item->codPeca = $_POST['codPecaRem'];
        $item->qtdPeca = $_POST['qtdPecaRem'];

	if($item->remItem()){
		echo 'Quantidade removida com sucesso!';
	} else{
		echo 'Nao foi possivel remover o item.';
	}
?>
