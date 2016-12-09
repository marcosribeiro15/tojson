<?php
include_once '../Classes/add-key.php';
include_once '../Classes/consulta.php';
include_once '../System/key-edition.php';
session_start();

class KeyControle{
	public function addkey(){
		// if(!isset($_SESSION['serverODL']) || empty($_SESSION['serverODL'])) header('location: ../../index.php');
		// else $serverODL=$_SESSION['serverODL'];

		$serverODL='10.132.12.138:8181';

		KeyControle::make_addkey();
		$script='curl -u "admin":"admin" -H "Content-type: application/json" -X POST \http://'.$serverODL.'/restconf/operations/odl-mappingservice:add-key \--data @/var/www/html/tojson/json/addkey.json --trace /var/www/html/tojson/logs/tmp';
		$_SESSION['log'] = shell_exec($script);
	}
	public function removekey(){
		// if(!isset($_SESSION['serverODL']) || empty($_SESSION['serverODL'])) header('location: ../../index.php');
		// else $serverODL=$_SESSION['serverODL'];
		// KeyControle::make_consulta();

		$serverODL='10.132.12.138:8181';

		$script='curl -u "admin":"admin" -H "Content-type: application/json" -X POST \http://'.$serverODL.'/restconf/operations/odl-mappingservice:remove-key \--data @/var/www/html/tojson/json/consulta.json --trace /var/www/html/tojson/logs/tmp';
		$_SESSION['log'] = shell_exec($script);
	
	}
	public function getkey(){
		// if(!isset($_SESSION['serverODL']) || empty($_SESSION['serverODL'])) header('location: ../../index.php');
		// else $serverODL=$_SESSION['serverODL'];

		$serverODL='10.132.12.138:8181';

		KeyControle::make_consulta();
		$script='curl -u "admin":"admin" -H "Content-type: application/json" -X POST \http://'.$serverODL.'/restconf/operations/odl-mappingservice:get-key \--data @/var/www/html/tojson/json/consulta.json --trace /var/www/html/tojson/logs/tmp';
		$_SESSION['log'] = shell_exec($script);
	}
	public function refreshkey(){
		// if(!isset($_SESSION['serverODL']) || empty($_SESSION['serverODL'])) header('location: ../../index.php');
		// else $serverODL=$_SESSION['serverODL'];

		$serverODL='10.132.12.138:8181';
		
		KeyControle::make_addkey();
		$script='curl -u "admin":"admin" -H "Content-type: application/json" -X POST \http://'.$serverODL.'/restconf/operations/odl-mappingservice:update-key \--data @/var/www/html/tojson/json/addkey.json --trace /var/www/html/tojson/logs/tmp';
		$_SESSION['log'] = shell_exec($script);
	}
	public function not_null($variable){
		return isset($_GET[$variable]);
	}
	public function make_consulta(){
		$consulta= new consulta();
		if(KeyControle::not_null('ipv4_prefix_eid')){
		$consulta->ipv4_prefix_eid = $_GET['ipv4_prefix_eid'];
		$consulta->mask = $_GET['mask'];
		KeyEdition::script_consulta($consulta);
		}
	}
	public function make_addkey(){
		$key= new add_key();
		if(KeyControle::not_null('ipv4_prefix_eid')){
			$key->ipv4_prefix_eid = $_GET['ipv4_prefix_eid'];
			$key->mask = $_GET['mask'];
			$key->key_string = $_GET['key_string'];
			$key->key_type = $_GET['key_type'];
			KeyEdition::script_add_key($key);
		}else echo "por algum motivo nao deu certo";
	}
}

if(KeyControle::not_null('action')){
	$action = $_GET['action'];
	if($action == 'del') KeyControle::removekey();
 	else if($action == 'refresh') KeyControle::refreshkey();
 	else if($action == 'add') KeyControle::addkey();
	else if($action == 'get') KeyControle::getkey();
}
header('Location: ../../index.php');

?>