<?php
session_start();
include_once 'conexaoBD.php';
include_once 'Usuario.php';

class UsuarioDAO extends Connection{
	public function cadastrar($usuario){
		$conexao = parent::abrirConexao();
		$sql = "insert into usuario(login, senha, serverodl) values (:login,:senha, :serverODL)";
		$stmt = $conexao->prepare($sql);
		$stmt->bindParam(':login', $usuario->login);
		$stmt->bindParam(':senha', $usuario->senha);
		$stmt->bindParam(':serverODL', $usuario->serverODL);
		$stmt->execute();  

		parent::fecharConexao($conexao);
	}

	public function atualizar($usuario){
		$conexao = parent::abrirConexao();
		$sql = "update usuario set senha=:senha, serverodl=:serverODL where login=:login";
		$stmt = $conexao->prepare($sql);
		$stmt->bindParam(':login', $usuario->login);
		$stmt->bindParam(':senha', $usuario->senha);
		$stmt->bindParam(':serverODL', $usuario->serverODL);
		$stmt->execute();

		$_SESSION['serverODL'] = $usuario->serverODL;

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
		$usuario->serverODL= $usuarioBD->serverODL;
		
		return $usuario;
	}
}
	public function logar($login, $senha){
		$conexao = parent::abrirConexao();
		$sql = "SELECT login, senha, serverodl FROM usuario where login = ?";
		$stmt = $conexao->prepare($sql);
		$stmt->bindParam(1, $login);
		$stmt->execute();
		if($usuarioBD = $stmt->fetchObject()){
				if ($usuarioBD->login == $login && $usuarioBD->senha == $senha){
					$_SESSION['login'] = $login ;
					$_SESSION['serverODL'] = $usuarioBD->serverodl;
					parent::fecharConexao($conexao);
					return TRUE;
				}
		parent::fecharConexao($conexao);
		return FALSE;
		}		
	}
}
?>