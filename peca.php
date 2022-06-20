<?php
	class Peca{
		// Conexao
		private $conn;
		// Tabela
		private $db_cli = "peca";
 
		// Colunas da base de dados
		private $aspas = "'";
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

		// Adiciona quantidade de peças já existentes no estoque

	
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

		// Atualiza a base de dados
		public function getPeca(){
			$sqlQuery = "SELECT codPeca, nomePeca, descPeca, qtdPeca FROM ". $this->db_cli ." WHERE codPeca = ? LIMIT 0,1";
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->bindParam(1, $this->codPeca);
			$stmt->execute();
			$dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
			$this->codPeca = $dataRow['codPeca'];
			$this->nomePeca = $dataRow['nomePeca'];
			$this->descPeca = $dataRow['descPeca'];
			$this->qtdPeca = $dataRow['qtdPeca'];
		}

		// Atualiza telefone
            public function updateTelefone(){
                $sqlQuery = "UPDATE ". $this->db_cli ." SET telefone = :telefone WHERE id_prest = :id_prest";
                $stmt = $this->conn->prepare($sqlQuery);
                $this->telefone=htmlspecialchars(strip_tags($this->telefone));
                $this->id_prest=htmlspecialchars(strip_tags($this->id_prest));

                // Obtem os dados
                $stmt->bindParam(":telefone", $this->telefone);
                $stmt->bindParam(":id_prest", $this->id_prest);
                if($stmt->execute()){
                    return true;
                }
                    return false;
            }

			public function addItem(){
				$sqlQuery = "UPDATE ". $this->db_cli ." SET qtdPeca = (:qtdPecaAdd + qtdPeca) WHERE codPeca = :codPecaAdd";
				$stmt = $this->conn->prepare($sqlQuery);
				$this->qtdPecaAdd=htmlspecialchars(strip_tags($this->qtdPecaAdd));
				$this->codPecaAdd=htmlspecialchars(strip_tags($this->codPecaAdd));
					
				// Obtem os dados
				$stmt->bindParam(":qtdPecaAdd", $this->qtdPecaAdd);
				$stmt->bindParam(":codPecaAdd", $this->codPecaAdd);
				if($stmt->execute()){
					return true;
				}
					return false;
			}

			public function remItem(){
				$sqlQuery = "UPDATE ". $this->db_cli ." SET qtdPeca = qtdPeca - :qtdPecaRem WHERE codPeca = :codPecaRem";
				$stmt = $this->conn->prepare($sqlQuery);
				$this->qtdPecaRem=htmlspecialchars(strip_tags($this->qtdPecaRem));
				$this->codPecaRem=htmlspecialchars(strip_tags($this->codPecaRem));
				$stmt->execute();
	
				// Obtem os dados
				$stmt->bindParam(":qtdPecaRem", $this->qtdPecaRem);
				$stmt->bindParam(":codPecaRem", $this->codPecaRem);
				if($stmt->execute()){
					return true;
				}
					return false;
			}
	}
?>