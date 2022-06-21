<?php
	include_once 'database_estoque.php';
	include_once 'peca.php';
	$database = new Database();
	$db = $database->getConnection(); 
	$item = new Peca($db);
        $item->codPecaAdd = $_POST['codPecaAdd'];
        $item->qtdPecaAdd = $_POST['qtdPecaAdd'];

	if($item->addItem()){
//		if($codPecaAdd != $resultado) {
//			echo json_encode(array("mensagem" => "Inserido com sucesso"));
//		} else {
//			echo json_encode(array("mensagem" => "Falha ao inserir"));
//		}
		return true;		
	} else{
		return false;
	}
?>