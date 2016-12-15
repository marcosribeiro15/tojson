<?php
session_start();
include_once 'conexaoBD.php';
include_once 'Usuario.php';

class UsuarioDAO extends Connection{
	public function cadastrar($usuario){
		$conexao = parent::abrirConexao();
		$sql = "insert into usuario(login, senha) values (:login,:senha)";
		$stmt = $conexao->prepare($sql);
		$stmt->bindParam(':login', $usuario->login);
		$stmt->bindParam(':senha', $usuario->senha);
		$stmt->execute();  

		parent::fecharConexao($conexao);
	}

	public function buscar($login){
		$conexao = parent::abrirConexao();
		$sql = "SELECT * FROM Usuario where login = ?";
		$stmt = $conexao->prepare($sql);
		$stmt->bindParam(1, $login);
		$stmt->execute();

		$usuario = new Usuario();

		if($usuarioBD = $stmt->fetchObject()){
		$usuario->login = $usuarioBD->login;
		$usuario->senha = $usuarioBD->senha;
		$usuario->id= $usuarioBD->id;
		
		return $usuario;
	}
}
	public function logar($login, $senha){
		$conexao = parent::abrirConexao();
		$sql = "SELECT login, senha FROM usuario where login = ?";
		$stmt = $conexao->prepare($sql);
		$stmt->bindParam(1, $login);
		$stmt->execute();
		$usuario = new Usuario();
		if($usuarioBD = $stmt->fetchObject()){
				if ($usuarioBD->login == $login && $usuarioBD->senha == $senha){
					$_SESSION['login'] = $login ;
					$_SESSION['senha'] = $senha ;
					parent::fecharConexao($conexao);
					return TRUE;
				}
		parent::fecharConexao($conexao);
		return FALSE;
		}		
	}
}
?>