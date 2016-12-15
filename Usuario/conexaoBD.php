<?php
class Connection{
	private $user = "postgres";
	private $password = "postgres";
	//private $host = "localhost";

	protected function abrirConexao(){
		try{
		$conexao = new PDO('pgsql:dbname=tojson host=localhost',$this->user,$this->password);
		}catch(PDOException $ex){
		echo $ex->getMessage();
		die();
		}
		return $conexao;		
	}
	
	protected function fecharConexao($conexao){
		$conexao=null;
	}	
}
?>
