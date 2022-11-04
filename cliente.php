<?php
	class Cliente{
		// Conexao
		private $conn;
		// Tabela
		private $db_cli = "clientes.clientes";
 
		// Colunas da base de dados
		public $cli_id;
		public $nomeCli;
		public $endCli;
		public $numeroEndCli;
		public $telCli;
		public $celCli;
		public $codCliRem;


		// Conexao com a base de dados
		public function __construct($db){$this->conn = $db;}
		// Lista todos clientes
		public function getAll(){
			$sqlQuery = "SELECT * FROM " . $this->db_cli . "";
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->execute();
			return $stmt;
		}


		// Lista todos clientes
		public function getClientes(){
				$sqlQuery = "SELECT * FROM " . $this->db_cli . "";
				$stmt = $this->conn->prepare($sqlQuery);
				$stmt->execute();
				return $stmt;
		}


		// Cadastro Cliente
		public function cadastroCliente(){
			$sqlQuery = "INSERT INTO ". $this->db_cli ." SET nomeCli = :nomeCli, endCli = :endCli, numeroEndCli = :numeroEndCli, telCli = :telCli, celCli = :celCli";

			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->execute();

			// Limpa conteudo
			$this->nomeCli=htmlspecialchars(strip_tags($this->nomeCli));
			$this->endCli=htmlspecialchars(strip_tags($this->endCli));
			$this->numeroEndCli=htmlspecialchars(strip_tags($this->numeroEndCli));
			$this->telCli=htmlspecialchars(strip_tags($this->telCli));
			$this->celCli=htmlspecialchars(strip_tags($this->celCli));

			// Obtem o dado
            $stmt->bindParam(":nomeCli", $this->nomeCli);
            $stmt->bindParam(":endCli", $this->endCli);
            $stmt->bindParam(":numeroEndCli", $this->numeroEndCli);
			$stmt->bindParam(":telCli", $this->telCli);
			$stmt->bindParam(":celCli", $this->celCli);
			if($stmt->execute()){
				return true;
			}
				return false;
		}

		public function remCliente(){
			$sqlQuery = "DELETE from ". $this->db_cli ." WHERE cli_id = :codCliRem";
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->execute();

			$this->codCliRem=htmlspecialchars(strip_tags($this->codCliRem));
			$stmt->execute();
	
			// Obtem os dados
			$stmt->bindParam(":codCliRem", $this->codCliRem);
			if($stmt->execute()){
				return true;
			}
				return false;
		}
	}
?>