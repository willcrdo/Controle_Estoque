<?php
	class Peca{
		// Conexao
		private $conn;
		// Tabela
		private $db_cli = "peca";
 
		// Colunas da base de dados
		public $peca_id;
		public $codPeca;
		public $nomePeca;
		public $descPeca;
		public $qtdPeca;

		// Conexao com a base de dados
		public function __construct($db){$this->conn = $db;}
		// Lista todas as peças
		public function getAll(){
			$sqlQuery = "SELECT codPeca, nomePeca, descPeca, qtdPeca FROM " . $this->db_cli . "";
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->execute();
			return $stmt;
		}


		// Lista prestadores informatica 
                public function getInfo(){
                        $sqlQuery = "SELECT id_prest, nome, telefone, celular, mail, desc_serv FROM " . $this->db_cli . " where id_categoria = 1";
                        $stmt = $this->conn->prepare($sqlQuery);
                        $stmt->execute();
                        return $stmt;
                }

                // Lista prestadores Construcao civil 
                public function getconstr(){
                        $sqlQuery = "SELECT id_prest, nome, telefone, celular, mail, desc_serv FROM " . $this->db_cli . " where id_categoria = 2";
                        $stmt = $this->conn->prepare($sqlQuery);
                        $stmt->execute();
                        return $stmt;
                }
                // Lista prestadores automotivo
                public function getAuto(){
                        $sqlQuery = "SELECT id_prest, nome, telefone, celular, mail, desc_serv FROM " . $this->db_cli . " where id_categoria = 3";
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

		// Atualiza a base de dados
		public function getPeca(){
			$sqlQuery = "SELECT codPeca, nomePeca, descPeca, qtdPeca FROM ". $this->db_cli ." WHERE codPeca = ? LIMIT 0,1";
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->bindParam(1, $this->id_prest);
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

		// Atualiza celular
		public function updateCelular(){
			$sqlQuery = "UPDATE ". $this->db_cli ." SET celular = :celular WHERE id_prest = :id_prest";
			$stmt = $this->conn->prepare($sqlQuery);
			$this->celular=htmlspecialchars(strip_tags($this->celular));
			$this->id_prest=htmlspecialchars(strip_tags($this->id_prest));

			// Obtem os dados
			$stmt->bindParam(":celular", $this->celular);
			$stmt->bindParam(":id_prest", $this->id_prest);
			if($stmt->execute()){
				return true;
			}
				return false;
		}

		// Apaga Cliente
		function deleteCliente(){
			$sqlQuery = "DELETE FROM " . $this->db_cli . " WHERE id_prest = ?";
			$stmt = $this->conn->prepare($sqlQuery);
			$this->id_prest=htmlspecialchars(strip_tags($this->id_prest));
			$stmt->bindParam(1, $this->id_prest);
			if($stmt->execute()){
				return true;
			}
				return false;
			}
		}
?>