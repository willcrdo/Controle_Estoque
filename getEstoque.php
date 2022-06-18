<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
	include_once 'database_estoque.php';
	include_once 'peca.php';
	$database = new Database();
	$db = $database->getConnection();
	$items = new Peca($db);
	$stmt = $items->getEstoque();
	$itemCount = $stmt->rowCount();
	if($itemCount > 0){
	$estoqueArr = array();
  	$estoqueArr["body"] = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			extract($row);
			$e = array("codPeca" => $codPeca,"nomePeca" => $nomePeca,"descPeca" => $descPeca,"qtdPeca" => $qtdPeca);
                        array_push($estoqueArr["body"], $e);
		}
  		echo json_encode($estoqueArr);
	} else{
		http_response_code(404);
		echo json_encode(array("mensagem" => "Nenhum item encontrado"));
	}
?>
