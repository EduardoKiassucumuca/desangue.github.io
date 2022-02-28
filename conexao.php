<?php
	class Conexao
	{
		private $servidor,$user,$pass,$bd,$conexao;
	
		public function __construct()
		{
			$this->servidor = "localhost";
			$this->user = "root";
			$this->pass = '';
			$this->bd = 'bd_desangue';
		}
		
		public function crear_conexao()
		{
			$this->conexao = new mysqli($this->servidor,$this->user,$this->pass,$this->bd);

			if($this->conexao->connect_error)
			{
				die("Erro ao criar a conexão com o banco de dados! contacte um técnico".$this->conexao->connect_error);
			}
			else
			{
				return $this->conexao;
			}
		}
	}
	
?>