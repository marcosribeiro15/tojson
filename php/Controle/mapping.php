<?php
session_start();
include_once '../Classes/add-mapping-ELP.php';
include_once '../Classes/add-mapping-path.php';
include_once '../Classes/add-mapping-LB.php';
include_once '../Classes/consulta.php';
include_once '../System/key-edition.php';


class MappingControle{

	public function addmappingELP(){
		// if(!isset($_SESSION['serverODL']) || empty($_SESSION['serverODL'])) header('location: ../../index.php');
		// else $serverODL=$_SESSION['serverODL'];

		$serverODL='200.129.39.109:8181';

		MappingControle::make_addmapping_elp();
		$script='curl -u "admin":"admin" -H "Content-type: application/json" -X POST http://'.$serverODL.'/restconf/operations/odl-mappingservice:add-mapping --data @/var/www/html/tojson/json/addmappingelp.json --trace /var/www/html/tojson/logs/tmp';
		$_SESSION['log'] = shell_exec($script);
		if(empty($_SESSION['log'])) $_SESSION['log'] = 'Mapeamento adicionado com sucesso';
	}
	public function addmappingPATH(){
		// if(!isset($_SESSION['serverODL']) || empty($_SESSION['serverODL'])) header('location: ../../index.php');
		// else $serverODL=$_SESSION['serverODL'];

		$serverODL='200.129.39.109:8181';

		MappingControle::make_addmapping_path();
		$script='curl -u "admin":"admin" -H "Content-type: application/json" -X POST http://'.$serverODL.'/restconf/operations/odl-mappingservice:add-mapping --data @/var/www/html/tojson/json/addmappingpath.json --trace /var/www/html/tojson/logs/tmp';
		$_SESSION['log'] = shell_exec($script);
		if(empty($_SESSION['log'])) $_SESSION['log'] = 'Mapeamento adicionado com sucesso';
	}
	public function addmappingLB(){
		// if(!isset($_SESSION['serverODL']) || empty($_SESSION['serverODL'])) header('location: ../../index.php');
		// else $serverODL=$_SESSION['serverODL'];

		$serverODL='200.129.39.109:8181';
		MappingControle::make_addmapping_lb();
		$script='curl -u "admin":"admin" -H "Content-type: application/json" -X POST http://'.$serverODL.'/restconf/operations/odl-mappingservice:add-mapping --data @/var/www/html/tojson/json/addmappinglb.json --trace /var/www/html/tojson/logs/tmp';
		$_SESSION['log'] = shell_exec($script);
		if(empty($_SESSION['log'])) $_SESSION['log'] = 'Mapeamento adicionado com sucesso';
	}
	public function removemapping(){
		if(!isset($_SESSION['serverODL']) || empty($_SESSION['serverODL'])) header('location: ../../index.php');
		else $serverODL=$_SESSION['serverODL'];

		$serverODL='200.129.39.109:8181';

		MappingControle::make_consulta();
		$script='curl -u "admin":"admin" -H "Content-type: application/json" -X POST \http://'.$serverODL.'/restconf/operations/odl-mappingservice:remove-mapping \--data @/var/www/html/tojson/json/consulta.json --trace /var/www/html/tojson/logs/tmp';
		$_SESSION['log'] = shell_exec($script);
		if(empty($_SESSION['log'])) $_SESSION['log'] = 'Mapeamento removido com sucesso';
	}
	public function getmapping(){
		// if(!isset($_SESSION['serverODL']) || empty($_SESSION['serverODL'])) header('location: ../../index.php');
		// else $serverODL=$_SESSION['serverODL'];

		$serverODL='200.129.39.109:8181';

		MappingControle::make_consulta();
		$script='curl -u "admin":"admin" -H "Content-type: application/json" -X POST http://'.$serverODL.'/restconf/operations/odl-mappingservice:get-mapping --data @/var/www/html/tojson/json/consulta.json --trace /var/www/html/tojson/logs/tmp';
		$_SESSION['log'] = shell_exec($script);
	}
	public function not_null($variable){
		return isset($_GET[$variable]);
	}
	public function make_consulta(){
		$consulta= new consulta();
		if(MappingControle::not_null('ipv4_prefix_eid')){
		$consulta->ipv4_prefix_eid = $_GET['ipv4_prefix_eid'];
		$consulta->mask = $_GET['mask'];
		KeyEdition::script_consulta($consulta);
		}
	}
	public function make_addmapping_path(){
		$mapping = new add_mapping_path();
		if(MappingControle::not_null('recordttl')){
			$mapping->recordttl = $_GET['recordttl'];
			$mapping->action = $_GET['action'];
			$mapping->authoritative = $_GET['authoritative'];
			$mapping->ipv4_prefix_eid = $_GET['ipv4_prefix_eid'];
			$mapping->mask = $_GET['mask'];
			$mapping->locator_id = $_GET['locator_id'];
			$mapping->priority = $_GET['priority'];
			$mapping->weight = $_GET['weight'];
			$mapping->multicastPriority = $_GET['multicastPriority'];
			$mapping->multicastWeight = $_GET['multicastWeight'];
			$mapping->localLocator = $_GET['localLocator'];
			$mapping->rlocProbed = $_GET['rlocProbed'];
			$mapping->routed = $_GET['routed'];
			$mapping->ipv4_rloc = $_GET['ipv4_rloc'];
			KeyEdition::script_add_mapping_path($mapping);
		}else echo "por algum motivo nao deu certo";
	}
	public function make_addmapping_elp(){
		$mapping = new add_mapping_elp();
		if(MappingControle::not_null('recordttl')){
			$mapping->recordttl = $_GET['recordttl'];
			$mapping->action = $_GET['action'];
			$mapping->authoritative = $_GET['authoritative'];
			$mapping->ipv4_prefix_eid = $_GET['ipv4_prefix_eid'];
			$mapping->mask = $_GET['mask'];
			$mapping->locator_id = $_GET['locator_id'];
			$mapping->priority = $_GET['priority'];
			$mapping->weight = $_GET['weight'];
			$mapping->multicastPriority = $_GET['multicastPriority'];
			$mapping->multicastWeight = $_GET['multicastWeight'];
			$mapping->localLocator = $_GET['localLocator'];
			$mapping->rlocProbed = $_GET['rlocProbed'];
			$mapping->routed = $_GET['routed'];
			$mapping->ipv4_rloc = $_GET['ipv4_rloc'];
			$mapping->hop_id_router = $_GET['hop_id_router'];
			$mapping->address_router = $_GET['address_router'];
			$mapping->lrs_bits_router = $_GET['lrs_bits_router'];
			$mapping->hop_id_both = $_GET['hop_id_both'];
			$mapping->address_both = $_GET['address_both'];
			$mapping->lrs_bits_both = $_GET['lrs_bits_both'];

			KeyEdition::script_add_mapping_elp($mapping);
		}else echo "por algum motivo nao deu certo";
	}
	public function make_addmapping_lb(){
		$mapping = new add_mapping_path();
		if(MappingControle::not_null('recordttl')){
			$mapping->recordttl = $_GET['recordttl'];
			$mapping->action = $_GET['action'];
			$mapping->authoritative = $_GET['authoritative'];
			$mapping->ipv4_prefix_eid = $_GET['ipv4_prefix_eid'];
			$mapping->mask = $_GET['mask'];
			$mapping->locator_id_path1 = $_GET['locator_id_path1'];
			$mapping->priority_path1 = $_GET['priority_path1'];
			$mapping->weight_path1 = $_GET['weight_path1'];
			$mapping->multicastPriority_path1 = $_GET['multicastPriority_path1'];
			$mapping->multicastWeight_path1 = $_GET['multicastWeight_path1'];
			$mapping->localLocator_path1 = $_GET['localLocator_path1'];
			$mapping->rlocProbed_path1 = $_GET['rlocProbed_path1'];
			$mapping->routed_path1 = $_GET['routed_path1'];
			$mapping->ipv4_rloc_path1 = $_GET['ipv4_rloc_path1'];
			$mapping->locator_id_path2 = $_GET['locator_id_path2'];
			$mapping->priority_path2 = $_GET['priority_path2'];
			$mapping->weight_path2 = $_GET['weight_path2'];
			$mapping->multicastPriority_path2 = $_GET['multicastPriority_path2'];
			$mapping->multicastWeight_path2 = $_GET['multicastWeight_path2'];
			$mapping->localLocator_path2 = $_GET['localLocator_path2'];
			$mapping->rlocProbed_path2 = $_GET['rlocProbed_path2'];
			$mapping->routed_path2 = $_GET['routed_path2'];
			$mapping->ipv4_rloc_path2 = $_GET['ipv4_rloc_path2'];
			KeyEdition::script_add_mapping_lb($mapping);
		}else echo "por algum motivo nao deu certo";
	}

}
if(MappingControle::not_null('acao')){
	$action = $_GET['acao'];
	if($action == 'del') MappingControle::removemapping();
 	else if($action == 'addpath')MappingControle::addmappingPATH();
 	else if($action == 'addelp') MappingControle::addmappingELP();
 	else if($action == 'addlb') MappingControle::addmappingLB();
	else if($action == 'get') MappingControle::getmapping();
}

header('Location: ../../mapping.php');

?>