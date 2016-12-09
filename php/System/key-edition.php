<?php

class KeyEdition{
	public function script_add_key($key){
		$edition="sed -e 's/\"ipv4-prefix\": \"172.18.0.2\/32\"/\"ipv4-prefix\": \"".$key->ipv4_prefix_eid."\/".$key->mask."\"/g' /var/www/html/tojson/models/addkey.json > /var/www/html/tojson/json/addkey.json 2>&1";
		shell_exec($edition);
		$edition = "sed -i 's/\"key-string\": \"admin\"/\"key-string\": \"".$key->key_string."\"/g' /var/www/html/tojson/json/addkey.json 2>&1";
		shell_exec($edition);
		$edition = "sed -i 's/\"key-type\": 1/\"key-type\": ".$key->key_type."/g' /var/www/html/tojson/json/addkey.json 2>&1";
		shell_exec($edition);
	}
	public function script_consulta($consulta){
		$edition="sed -e 's/\"ipv4-prefix\": \"172.18.0.2\/32\"/\"ipv4-prefix\": \"30.30.30.30\/32\"/g' /var/www/html/tojson/models/consulta.json > /var/www/html/tojson/json/consulta.json 2>&1";
		shell_exec($edition);
	}
	public function script_add_mapping_path($mapping){
		//set recordttl from path
		$variable='recordTtl'; $original_value='1440';
		$edition="sed -e 's/\"".$variable."\": ".$original_value."/\"".$variable."\": ".$mapping->recordttl."/g' /var/www/html/tojson/models/addmappingpath.json > /var/www/html/tojson/json/addmappingpath.json 2>&1";
		shell_exec($edition);
		//set action from addmappingpath
		$variable='action'; $original_value='NoAction';
		$edition="sed -i 's/\"".$variable."\": \"".$original_value."\"/\"".$variable."\": \"".$mapping->$variable."\"/g' /var/www/html/tojson/json/addmappingpath.json 2>&1";
		shell_exec($edition);	
		//set authoritative from addmappingpath
		$variable='authoritative'; $original_value='true';
		$edition="sed -i 's/\"".$variable."\": ".$original_value."/\"".$variable."\": ".$mapping->$variable."/g' /var/www/html/tojson/json/addmappingpath.json 2>&1";
		shell_exec($edition);
		//set ipv4_prefix_eid from addmappingpath
		$edition="sed -i 's/\"ipv4-prefix\": \"172.18.0.2\/32\"/\"ipv4-prefix\": \"".$mapping->ipv4_prefix_eid."\/".$mapping->mask."\"/g' /var/www/html/tojson/json/addmappingpath.json 2>&1";
		shell_exec($edition);
		//set locator_id from addmappingpath
		$variable='locator-id'; $original_value='path1';
		$edition="sed -i 's/\"".$variable."\": \"".$original_value."\"/\"".$variable."\": \"".$mapping->locator_id."\"/g' /var/www/html/tojson/json/addmappingpath.json 2>&1";
		shell_exec($edition);
		//set priority from addmappingpath
		$variable='priority'; $original_value='1';
		$edition="sed -i 's/\"".$variable."\": ".$original_value."/\"".$variable."\": ".$mapping->$variable."/g' /var/www/html/tojson/json/addmappingpath.json 2>&1";
		shell_exec($edition);
		//set wheight from addmappingpath
		$variable='weight'; $original_value='1';
		$edition="sed -i 's/\"".$variable."\": ".$original_value."/\"".$variable."\": ".$mapping->$variable."/g' /var/www/html/tojson/json/addmappingpath.json 2>&1";
		shell_exec($edition);
		//set multicatPriority from addmappingpath
		$variable='multicastPriority'; $original_value='255';
		$edition="sed -i 's/\"".$variable."\": ".$original_value."/\"".$variable."\": ".$mapping->$variable."/g' /var/www/html/tojson/json/addmappingpath.json 2>&1";
		shell_exec($edition);
		//set multicatWeight from addmappingpath
		$variable='multicastWeight'; $original_value='0';
		$edition="sed -i 's/\"".$variable."\": ".$original_value."/\"".$variable."\": ".$mapping->$variable."/g' /var/www/html/tojson/json/addmappingpath.json 2>&1";
		shell_exec($edition);
		//set localLocator from addmappingpath
		$variable='localLocator'; $original_value='true';
		$edition="sed -i 's/\"".$variable."\": ".$original_value."/\"".$variable."\": ".$mapping->$variable."/g' /var/www/html/tojson/json/addmappingpath.json 2>&1";
		shell_exec($edition);
		//set rlocProbed from addmappingpath
		$variable='rlocProbed'; $original_value='false';
		$edition="sed -i 's/\"".$variable."\": ".$original_value."/\"".$variable."\": ".$mapping->$variable."/g' /var/www/html/tojson/json/addmappingpath.json 2>&1";
		shell_exec($edition);
		//set routed from addmappingpath
		$variable='routed'; $original_value='true';
		$edition="sed -i 's/\"".$variable."\": ".$original_value."/\"".$variable."\": ".$mapping->$variable."/g' /var/www/html/tojson/json/addmappingpath.json 2>&1";
		shell_exec($edition);
		//set multicatPriority from addmappingpath
		$variable='ipv4'; $original_value='192.168.101.1';
		$edition="sed -i 's/\"".$variable."\": \"".$original_value."\"/\"".$variable."\": \"".$mapping->ipv4_rloc."\"/g' /var/www/html/tojson/json/addmappingpath.json 2>&1";
		shell_exec($edition);
	}
	public function script_add_mapping_lb($mapping){
		//set recordttl from addmappinglb
		$variable='recordTtl'; $original_value='1440';
		$edition="sed -e 's/\"".$variable."\": ".$original_value."/\"".$variable."\": ".$mapping->recordttl."/g' /var/www/html/tojson/models/addmappinglb.json > /var/www/html/tojson/json/addmappinglb.json 2>&1";
		shell_exec($edition);
		//set action from addmappinglb
		$variable='action'; $original_value='NoAction';
		$edition="sed -i 's/\"".$variable."\": \"".$original_value."\"/\"".$variable."\": \"".$mapping->$variable."\"/g' /var/www/html/tojson/json/addmappinglb.json 2>&1";
		shell_exec($edition);	
		//set authoritative from addmappinglb
		$variable='authoritative'; $original_value='true';
		$edition="sed -i 's/\"".$variable."\": ".$original_value."/\"".$variable."\": ".$mapping->$variable."/g' /var/www/html/tojson/json/addmappinglb.json 2>&1";
		shell_exec($edition);
		//set ipv4_prefix_eid from addmappinglb
		$edition="sed -i 's/\"ipv4-prefix\": \"172.18.0.2\/32\"/\"ipv4-prefix\": \"".$mapping->ipv4_prefix_eid."\/".$mapping->mask."\"/g' /var/www/html/tojson/json/addmappinglb.json 2>&1";
		shell_exec($edition);
		//set locator_id from addmappinglb path1
		$variable='locator-id'; $original_value='path1';
		$edition="sed -i 's/\"".$variable."\": \"".$original_value."\"/\"".$variable."\": \"".$mapping->locator_id_path1."\"/g' /var/www/html/tojson/json/addmappinglb.json 2>&1";
		shell_exec($edition);
		//set priority from addmappinglb path1
		$variable='priority'; $original_value='1'; $variable_complemento=$variable.'_path1';
		$edition="sed -i 's/\"".$variable."\": ".$original_value."/\"".$variable."\": ".$mapping->$variable_complemento."/g' /var/www/html/tojson/json/addmappinglb.json 2>&1";
		shell_exec($edition);
		//set wheight from addmappinglb path1
		$variable='weight'; $original_value='30';$variable_complemento=$variable.'_path1';
		$edition="sed -i 's/\"".$variable."\": ".$original_value."/\"".$variable."\": ".$mapping->$variable_complemento."/g' /var/www/html/tojson/json/addmappinglb.json 2>&1";
		shell_exec($edition);
		//set multicatPriority from addmappinglb path1
		$variable='multicastPriority'; $original_value='255';$variable_complemento=$variable.'_path1';
		$edition="sed -i 's/\"".$variable."\": ".$original_value."/\"".$variable."\": ".$mapping->$variable_complemento."/g' /var/www/html/tojson/json/addmappinglb.json 2>&1";
		shell_exec($edition);
		//set multicatWeight from addmappinglb path1
		$variable='multicastWeight'; $original_value='0';$variable_complemento=$variable.'_path1';
		$edition="sed -i 's/\"".$variable."\": ".$original_value."/\"".$variable."\": ".$mapping->$variable_complemento."/g' /var/www/html/tojson/json/addmappinglb.json 2>&1";
		shell_exec($edition);
		//set localLocator from addmappinglb path1
		$variable='localLocator'; $original_value='true';$variable_complemento=$variable.'_path1';
		$edition="sed -i 's/\"".$variable."\": ".$original_value."/\"".$variable."\": ".$mapping->$variable_complemento."/g' /var/www/html/tojson/json/addmappinglb.json 2>&1";
		shell_exec($edition);
		//set rlocProbed from addmappinglb path1
		$variable='rlocProbed'; $original_value='false';$variable_complemento=$variable.'_path1';
		$edition="sed -i 's/\"".$variable."\": ".$original_value."/\"".$variable."\": ".$mapping->$variable_complemento."/g' /var/www/html/tojson/json/addmappinglb.json 2>&1";
		shell_exec($edition);
		//set routed from addmappinglb path1
		$variable='routed'; $original_value='true';$variable_complemento=$variable.'_path1';
		$edition="sed -i 's/\"".$variable."\": ".$original_value."/\"".$variable."\": ".$mapping->$variable_complemento."/g' /var/www/html/tojson/json/addmappinglb.json 2>&1";
		shell_exec($edition);
		//set ipv4_rloc from addmappinglb path1
		$variable='ipv4'; $original_value='192.168.101.1';$complemento=$variable.'_rloc_path1';
		$edition="sed -i 's/\"".$variable."\": \"".$original_value."\"/\"".$variable."\": \"".$mapping->$complemento."\"/g' /var/www/html/tojson/json/addmappinglb.json 2>&1";
		shell_exec($edition);
		//set locator_id from addmappinglb path2
		$variable='locator-id'; $original_value='path2';$variable_complemento='locator_id_path1';
		$edition="sed -i 's/\"".$variable."\": \"".$original_value."\"/\"".$variable."\": \"".$mapping->$complemento."\"/g' /var/www/html/tojson/json/addmappinglb.json 2>&1";
		shell_exec($edition);
		//set priority from addmappinglb path2
		$variable='priority'; $original_value='2';$variable_complemento=$variable.'_path2';
		$edition="sed -i 's/\"".$variable."\": ".$original_value.",/\"".$variable."\": ".$mapping->$variable_complemento.",/g' /var/www/html/tojson/json/addmappinglb.json 2>&1";
		shell_exec($edition);
		//set wheight from addmappinglb path2
		$variable='weight'; $original_value='70';$variable_complemento=$variable.'_path2';
		$edition="sed -i 's/\"".$variable."\": ".$original_value.",/\"".$variable."\": ".$mapping->$variable_complemento.",/g' /var/www/html/tojson/json/addmappinglb.json 2>&1";
		shell_exec($edition);
		//set multicatPriority from addmappinglb path2
		$variable='multicastPriority'; $original_value='254';$variable_complemento=$variable.'_path2';
		$edition="sed -i 's/\"".$variable."\": ".$original_value.",/\"".$variable."\": ".$mapping->$variable_complemento.",/g' /var/www/html/tojson/json/addmappinglb.json 2>&1";
		shell_exec($edition);
		//set multicatWeight from addmappinglb path2
		$variable='multicastWeight'; $original_value='1';$variable_complemento=$variable.'_path2';
		$edition="sed -i 's/\"".$variable."\": ".$original_value.",/\"".$variable."\": ".$mapping->$variable_complemento.",/g' /var/www/html/tojson/json/addmappinglb.json 2>&1";
		shell_exec($edition);
		//set localLocator from addmappinglb path2
		$variable='localLocator'; $original_value='false';$variable_complemento=$variable.'_path2';
		$edition="sed -i 's/\"".$variable."\": ".$original_value.",/\"".$variable."\": ".$mapping->$variable_complemento.",/g' /var/www/html/tojson/json/addmappinglb.json 2>&1";
		shell_exec($edition);
		//set rlocProbed from addmappinglb path2
		$variable='rlocProbed'; $original_value='true';$variable_complemento=$variable.'_path2';
		$edition="sed -i 's/\"".$variable."\": ".$original_value.",/\"".$variable."\": ".$mapping->$variable_complemento.",/g' /var/www/html/tojson/json/addmappinglb.json 2>&1";
		shell_exec($edition);
		//set routed from addmappinglb path2
		$variable='routed'; $original_value='false';$variable_complemento=$variable.'_path2';
		$edition="sed -i 's/\"".$variable."\": ".$original_value.",/\"".$variable."\": ".$mapping->$variable_complemento.",/g' /var/www/html/tojson/json/addmappinglb.json 2>&1";
		shell_exec($edition);
		//set ipv4_rloc from addmappinglb path2
		$variable='ipv4'; $original_value='192.168.102.1';$variable_complemento=$variable.'_rloc_path2';
		$edition="sed -i 's/\"".$variable."\": \"".$original_value."\"/\"".$variable."\": \"".$mapping->$variable_complemento."\"/g' /var/www/html/tojson/json/addmappinglb.json 2>&1";
		shell_exec($edition);

	}
	public function script_add_mapping_elp($mapping){
		//set recordttl from addmappingelp
		$variable='recordTtl'; $original_value='1440';
		$edition="sed -e 's/\"".$variable."\": ".$original_value."/\"".$variable."\": ".$mapping->recordttl."/g' /var/www/html/tojson/models/addmappingelp.json > /var/www/html/tojson/json/addmappingelp.json 2>&1";
		shell_exec($edition);
		//set action from addmappingelp
		$variable='action'; $original_value='NoAction';
		$edition="sed -i 's/\"".$variable."\": \"".$original_value."\"/\"".$variable."\": \"".$mapping->$variable."\"/g' /var/www/html/tojson/json/addmappingelp.json 2>&1";
		shell_exec($edition);	
		//set authoritative from addmappingelp
		$variable='authoritative'; $original_value='true';
		$edition="sed -i 's/\"".$variable."\": ".$original_value."/\"".$variable."\": ".$mapping->$variable."/g' /var/www/html/tojson/json/addmappingelp.json 2>&1";
		shell_exec($edition);
		//set ipv4_prefix_eid from addmappingelp
		$edition="sed -i 's/\"ipv4-prefix\": \"172.18.0.2\/32\"/\"ipv4-prefix\": \"".$mapping->ipv4_prefix_eid."\/".$mapping->mask."\"/g' /var/www/html/tojson/json/addmappingelp.json 2>&1";
		shell_exec($edition);
		//set locator_id from addmappingelp
		$variable='locator-id'; $original_value='ELP';
		$edition="sed -i 's/\"".$variable."\": \"".$original_value."\"/\"".$variable."\": \"".$mapping->locator_id."\"/g' /var/www/html/tojson/json/addmappingelp.json 2>&1";
		shell_exec($edition);
		//set priority from addmappingelp
		$variable='priority'; $original_value='1';
		$edition="sed -i 's/\"".$variable."\": ".$original_value."/\"".$variable."\": ".$mapping->$variable."/g' /var/www/html/tojson/json/addmappingelp.json 2>&1";
		shell_exec($edition);
		//set wheight from addmappingelp
		$variable='weight'; $original_value='1';
		$edition="sed -i 's/\"".$variable."\": ".$original_value."/\"".$variable."\": ".$mapping->$variable."/g' /var/www/html/tojson/json/addmappingelp.json 2>&1";
		shell_exec($edition);
		//set multicatPriority from addmappingelp
		$variable='multicastPriority'; $original_value='255';
		$edition="sed -i 's/\"".$variable."\": ".$original_value."/\"".$variable."\": ".$mapping->$variable."/g' /var/www/html/tojson/json/addmappingelp.json 2>&1";
		shell_exec($edition);
		//set multicatWeight from addmappingelp
		$variable='multicastWeight'; $original_value='0';
		$edition="sed -i 's/\"".$variable."\": ".$original_value."/\"".$variable."\": ".$mapping->$variable."/g' /var/www/html/tojson/json/addmappingelp.json 2>&1";
		shell_exec($edition);
		//set localLocator from addmappingelp
		$variable='localLocator'; $original_value='true';
		$edition="sed -i 's/\"".$variable."\": ".$original_value."/\"".$variable."\": ".$mapping->$variable."/g' /var/www/html/tojson/json/addmappingelp.json 2>&1";
		shell_exec($edition);
		//set rlocProbed from addmappingelp
		$variable='rlocProbed'; $original_value='false';
		$edition="sed -i 's/\"".$variable."\": ".$original_value."/\"".$variable."\": ".$mapping->$variable."/g' /var/www/html/tojson/json/addmappingelp.json 2>&1";
		shell_exec($edition);
		//set routed from addmappingelp
		$variable='routed'; $original_value='true';
		$edition="sed -i 's/\"".$variable."\": ".$original_value."/\"".$variable."\": ".$mapping->$variable."/g' /var/www/html/tojson/json/addmappingelp.json 2>&1";
		shell_exec($edition);
		//set hp id router from addmappingelp
		$variable='hop-id'; $original_value='router1';
		$edition="sed -i 's/\"".$variable."\": \"".$original_value."\"/\"".$variable."\": \"".$mapping->hop_id_router."\"/g' /var/www/html/tojson/json/addmappingelp.json 2>&1";
		shell_exec($edition);
		//set address router from addmappingelp
		$variable='address'; $original_value='192.168.201.2';
		$edition="sed -i 's/\"".$variable."\": \"".$original_value."\"/\"".$variable."\": \"".$mapping->address_router."\"/g' /var/www/html/tojson/json/addmappingelp.json 2>&1";
		shell_exec($edition);
		//set lrs bits router from addmappingelp
		$variable='lrs-bits'; $original_value='strict';
		$edition="sed -i 's/\"".$variable."\": \"".$original_value."\"/\"".$variable."\": \"".$mapping->lrs_bits_router."\"/g' /var/www/html/tojson/json/addmappingelp.json 2>&1";
		shell_exec($edition);
		//set hp id server ou client from addmappingelp
		$variable='hop-id'; $original_value='client1';
		$edition="sed -i 's/\"".$variable."\": \"".$original_value."\",/\"".$variable."\": \"".$mapping->hop_id_both."\",/g' /var/www/html/tojson/json/addmappingelp.json 2>&1";
		shell_exec($edition);
		//set address server ou client from addmappingelp
		$variable='address'; $original_value='192.168.101.1';
		$edition="sed -i 's/\"".$variable."\": \"".$original_value."\",/\"".$variable."\": \"".$mapping->address_both."\",/g' /var/www/html/tojson/json/addmappingelp.json 2>&1";
		shell_exec($edition);
		//set lrs-bits server ou client from addmappingelp
		$variable='lrs-bits'; $original_value='example';
		$edition="sed -i 's/\"".$variable."\": \"".$original_value."\"/\"".$variable."\": \"".$mapping->lrs_bits_both."\"/g' /var/www/html/tojson/json/addmappingelp.json 2>&1";
		shell_exec($edition);
	}

}