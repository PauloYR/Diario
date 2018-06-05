<?php
class Conexao{
	private $con;
	public function getCon(){
		return $this->con;
	}
	public function setCon($data){
		$this->con = $data;
	}
	public function __construct(){
		try{
			// Endereço da Conexão
			$servidor = "127.0.0.1";
			$usr = "root";
			$pwd = "";
			$bd = "banco";
			$this->setCon(new PDO("mysql:host=$servidor;dbname=$bd",$usr,$pwd));
			$this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); // Erros em exceções
		}catch(PDOException $ex){
			echo "{$ex->getMessage()}";
		}	
	}
}
?>
