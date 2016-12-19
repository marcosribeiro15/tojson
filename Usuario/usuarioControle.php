<?php
include_once 'UsuarioDAO.php';

Class UsuarioControle{
	public function cadastrarUsuario(){
		
		if(isset($_GET['login']) && $_GET['login'] != ''){
			$loginUsuario = $_GET['login'];
			$senhaUsuario = $_GET['senha'];
			$serverODL = $_GET['serverODL'];

			$usuario = new Usuario();

			$usuario->login = $loginUsuario;
			$usuario->senha = $senhaUsuario;
			$usuario->serverODL = $serverODL;

			$usuarioDAO = new UsuarioDAO();
			$usuarioDAO->cadastrar($usuario);
		}    
	}
		public function atualizarUsuario(){
		
		if(isset($_GET['login']) && $_GET['login'] != ''){
			$loginUsuario = $_SESSION['login'];
			$senhaUsuario = $_GET['senha'];
			$serverODL = $_GET['serverODL'];

			$usuario = new Usuario();

			$usuario->login = $loginUsuario;
			$usuario->senha = $senhaUsuario;
			$usuario->serverODL = $serverODL;

			$usuarioDAO = new UsuarioDAO();
			$usuarioDAO->atualizar($usuario);
		}    
	}  

	public function sair(){
		unset($_SESSION['login']);
		unset($_SESSION['senha']);
		unset($_SESSION['serverODL']);
		session_destroy();
		header('location:../index.php');
	}

	public function logar(){
		if(isset($_GET['login']) && $_GET['login'] != ''){
			$usuarioDAO = new UsuarioDAO();
			$resultado = $usuarioDAO->logar($_GET['login'], $_GET['senha']);
			return $resultado;
		}else return FALSE;
	}

	public function buscarUsuario($login){
		$usuarioDAO = new UsuarioDAO();
		return $usuarioDAO->buscar($login);
	}
}
	if(isset($_GET['acao']))
		$acao = $_GET['acao'];
	else $acao=null;
	if($acao == 'registrar'){
		UsuarioControle::cadastrarUsuario();
		header('location:../index.php');
	}else if($acao == 'logar'){
		if(UsuarioControle::logar() == TRUE){
			header('location:../index.php');
		}
		else
			header('location:../index.php');
	}else if($acao == 'sair')
		UsuarioControle::sair();
	else if($acao == 'atualizar')
		UsuarioControle::atualizarUsuario();
	else if($acao == 'buscar')
		UsuarioControle::buscarUsuario();
?>