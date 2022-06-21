<?php
	include_once 'database_estoque.php';
	include_once 'peca.php';
	$database = new Database();
	$db = $database->getConnection();
	$item = new Peca($db);
        $item->codPecaRem = $_POST['codPecaRem'];
        $item->qtdPecaRem = $_POST['qtdPecaRem'];

	if($item->remItem()){
		echo 'Quantidade removida com sucesso!';
	} else{
		echo 'Nao foi possivel remover o item.';
	}
?>
