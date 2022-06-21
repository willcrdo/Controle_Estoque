<?php
	class Peca{
		// Conexao
		private $conn;
		// Tabela
		private $db_cli = "estoque.peca";
 
		// Colunas da base de dados
		public $peca_id;
		public $codPeca;
		public $nomePeca;
		public $descPeca;
		public $qtdPeca;
		public $qtdPecaAdd;
		public $codPecaAdd;
		public $qtdPecaRem;
		public $codPecaRem;


		// Conexao com a base de dados
		public function __construct($db){$this->conn = $db;}
		// Lista todas as peças
		public function getAll(){
			$sqlQuery = "SELECT codPeca, nomePeca, descPeca, qtdPeca FROM " . $this->db_cli . "";
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->execute();
			return $stmt;
		}


		// Lista todas as pecas
		public function getEstoque(){
				$sqlQuery = "SELECT codPeca, nomePeca, descPeca, qtdPeca FROM " . $this->db_cli . "";
				$stmt = $this->conn->prepare($sqlQuery);
				$stmt->execute();
				return $stmt;
		}


		// Cadastra Peca
		public function cadastroPeca(){
			$sqlQuery = "INSERT INTO ". $this->db_cli ." SET codPeca = :codPeca, nomePeca = :nomePeca, descPeca = :descPeca, qtdPeca = :qtdPeca";

			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->execute();

			// Limpa conteudo
			$this->codPeca=htmlspecialchars(strip_tags($this->codPeca));
			$this->nomePeca=htmlspecialchars(strip_tags($this->nomePeca));
			$this->descPeca=htmlspecialchars(strip_tags($this->descPeca));
			$this->qtdPeca=htmlspecialchars(strip_tags($this->qtdPeca));

			// Obtem o dado
            $stmt->bindParam(":codPeca", $this->codPeca);
            $stmt->bindParam(":nomePeca", $this->nomePeca);
            $stmt->bindParam(":descPeca", $this->descPeca);
			$stmt->bindParam(":qtdPeca", $this->qtdPeca);
			if($stmt->execute()){
				return true;
			}
				return false;
		}

		public function addItem(){
			$sqlQuery = "UPDATE ". $this->db_cli ." SET qtdPeca = :qtdPecaAdd + qtdPeca WHERE codPeca = :codPecaAdd";
			
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->execute();

			$this->codPecaAdd=htmlspecialchars(strip_tags($this->codPecaAdd));
			$this->qtdPecaAdd=htmlspecialchars(strip_tags($this->qtdPecaAdd));
					
			// Obtem os dados
			$stmt->bindParam(":codPecaAdd", $this->codPecaAdd);
			$stmt->bindParam(":qtdPecaAdd", $this->qtdPecaAdd);
			if($stmt->execute()){
//				$sqlQuery2 = "SELECT qtdPeca FROM ". $this->db_cli ." WHERE codPeca = :codPecaAdd";
//				$stmt2 = $this->conn->prepare($sqlQuery2);
//				$stmt2->execute();
//				$resultado = $stmt2; 
				return true;
			}
				return false;
		}

		public function remItem(){
			$sqlQuery = "UPDATE ". $this->db_cli ." SET qtdPeca = qtdPeca - :qtdPecaRem WHERE codPeca = :codPecaRem";
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->execute();

			$this->codPecaRem=htmlspecialchars(strip_tags($this->codPecaRem));
			$this->qtdPecaRem=htmlspecialchars(strip_tags($this->qtdPecaRem));
			$stmt->execute();
	
			// Obtem os dados
			$stmt->bindParam(":codPecaRem", $this->codPecaRem);
			$stmt->bindParam(":qtdPecaRem", $this->qtdPecaRem);
			if($stmt->execute()){
				return true;
			}
				return false;
		}
	}
?>