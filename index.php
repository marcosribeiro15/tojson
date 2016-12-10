<?php
session_start();
?>
<!DOCTYPE html>

<html lang="en">
<head>
  <title>Edição de arquivos json</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
<style>
.header {
    display: block;
    padding: 15px 20px;
    font-weight: 700;
    color: #fff;
    text-align: center;
    background-color: #0275d8
}
.container-fluid{
	display: block;
    padding: 15px 20px 50px 50px;
    font-weight: 700;
    color: #fff;
    text-align: center;
}
</style>
	<!-- // <script>
		var serverODL = prompt(' Digite <ip>:<port> do servidor ODL.\n Exemplo: 127.0.0.1:8181')
	// </script>
	<h1>Qual serviço voce deseja prover no servidor ODL?</h1> -->
	<div class="header">
		ToJson
	</div>
<body>    
    <div class="container-fluid" style="padding-top: 100px"> 
    	<div class="col-sm-5" style="margin-bottom: 50px;">
    		<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#keys" style="width:150px; margin-bottom: 10px"> Manage Keys </button>
		    	<div id="keys" class="collapse" style="width: auto">
					<!-- cadastrar chave -->
					<button type="button" class="btn btn-link" data-toggle="modal" data-target="#addkey" style="width:150px"> Add Key </button>
					<div id="addkey" class="modal fade" role="dialog">
					<div class="modal-dialog">
							<div class="modal-content"  style="color:gray">
        						<div class="modal-header">
        							<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h1 class="modal-title">add key</h1>
								</div>
								<div class="modal-body">
								<form method="get" action="php/Controle/key.php">
									ipv4_prefix_eid:<p> <input type="text" name="ipv4_prefix_eid" value="1.1.1.1">/
														<input type="text" name="mask" value="32"></br></br>
									key_string:<p> <input type="text" name="key_string" value="lisp-passwd"/></br></br>
									key_type:<p> <input type="text" name="key_type" value="1"/></br></br>
									<input type="hidden" name="action" value="add"/></br></br>
								        <input type="submit" value="Enviar"/></br>
								</form>
								</div>
							</div>
						</div>
					</div>
					<!-- atualizar chave -->
					<button type="button"  class="btn btn-link" data-toggle="modal" data-target="#refreshkey" style="width:150px;"> Refresh Key </button>
					<div id="refreshkey" class="modal fade" role="dialog">
					<div class="modal-dialog">
							<div class="modal-content"  style="color:gray">
        						<div class="modal-header">
        							<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h1 class="modal-title">add key</h1>
								</div>
								<div class="modal-body">
								<form method="get" action="php/Controle/key.php">
									ipv4_prefix_eid:<p> <input type="text" name="ipv4_prefix_eid" value="1.1.1.1">/
														<input type="text" name="mask" value="32"></br></br>
									key_string:<p> <input type="text" name="key_string" value="lisp-passwd"/></br></br>
									key_type:<p> <input type="text" name="key_type" value="1"/></br></br>
									<input type="hidden" name="action" value="refresh"></br></br>
								        <input type="submit" value="Refresh"/></br>
								</form>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Get key -->
					<form role="form-role" method="get" action="php/Controle/key.php">
						<div class="form-group">
							<div class="col-xs-2" style="width:130px;padding-right:4px">
									<label for="ipv4-prefix"></label><input class="form-control" id="ipv4-prefix" type="text" name="ipv4_prefix_eid" value="192.168.0.6">
							</div>
							<div class="col-xs-2"; style="width:60px;padding-left:0px;">
									<label for="mask"></label><input class="form-control" id="mask" type="text" name="mask" value="32">
							</div>
					        <input type="hidden" name="action" value="get"/>
					        <div style="padding-top: 20px;">
					    		<input type="submit" class="btn btn-default" data-toggle="collapse" data-target="#getkey" style="width:60px; float: left" value="Get" />
					    	</div>
						</div>
					</form>
					<br>
					<!-- delete key -->
					<form role="form-role" method="get" action="php/Controle/key.php">
						<div class="form-group">
							<div class="col-xs-2" style="width:130px;padding-right:4px">
									<label for="ipv4-prefix"></label><input class="form-control" id="ipv4-prefix" type="text" name="ipv4_prefix_eid" value="192.168.0.6">
							</div>
							<div class="col-xs-2"; style="width:60px;padding-left:0px;">
									<label for="mask"></label><input class="form-control" id="mask" type="text" name="mask" value="32">
							</div>
					        <input type="hidden" name="action" value="del"/>
					        <div style="padding-top: 20px;">
					    		<input type="submit" class="btn btn-default" data-toggle="collapse" data-target="#getkey" style="width:60px;float: left" value="Delete" />
					    	</div>
						</div>
					</form>
				</div>
	    </div>
	    <div class="col-sm-7">
	    		<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#mappings" style="width:150px"> Manage mappings</button>
		    	<div id="mappings" class="collapse" style="padding-top: 20px">
					<button type="button" class="btn btn-link" data-toggle="modal" data-target="#addmappingpath" style="width:150px"> Add mapping path </button>
					<div id="addmappingpath"  class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content"  style="color:gray">
        						<div class="modal-header">
        							<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h1 class="modal-title">add mapping path</h1>
								</div>
								<div class="modal-body">
										<form method="get" action="php/Controle/mapping.php">
											recordttl:<p> <input type="text" name="recordttl" value="1440"></br></br>
											action:<p> <select name="action">
													<option value="NoAction"> NoAction </option>
													<option value="NativelyForward"> NativelyForward </option>
													<option value="SendMapRequest"> SendMapRequest </option>
													<option value="Drop"> Drop </option>
													</select><br><br>
											authoritative:<p> <input type="radio" name="authoritative" value="true" checked>True
															  <input type="radio" name="authoritative" value="false">False</br></br>
											ipv4_prefix_eid:<p> <input type="text" name="ipv4_prefix_eid" value="1.1.1.1">/<input type="text" name="mask" value="32"><br><br>/
											locator_id:<p> <input type="text" name="locator_id" value="path1"></br></br>
											priority:<p> <input type="text" name="priority" value="1"></br></br>
											weight:<p> <input type="text" name="weight" value="30"></br></br>
											multicastPriority:<p> <input type="text" name="multicastPriority" value="255"></br></br>
											multicastWeight:<p> <input type="text" name="multicastWeight" value="0"></br></br>
											localLocator:<p> <input type="radio" name="localLocator" value="true" checked>True
															  	   <input type="radio" name="localLocator" value="false">False</br></br>
											rlocProbed:<p> <input type="radio" name="rlocProbed" value="true">True
															     <input type="radio" name="rlocProbed" value="false" checked>False</br></br>
											routed:<p>  <input type="radio" name="routed" value="true" checked>True
															  <input type="radio" name="routed" value="false">False</br></br>
											ipv4_rloc:<p> <input type="text" name="ipv4_rloc" value="1.1.1.1"></br></br>
											<input type="hidden" name="acao" value="addpath">
										    <input type="submit" value="Enviar"/></br>
										</form>
								</div>
							</div>
						</div>
					</div>
					<button type="button" class="btn btn-link" data-toggle="modal" data-target="#addmappinglb" style="width:150px"> Add mapping LB </button>
					<div id="addmappinglb" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content"  style="color:gray">
        						<div class="modal-header">
        							<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h1 class="modal-title"> Add mapping LB:</h1>
								</div>
								<div class="modal-body">
										<form method="get" action="php/Controle/mapping.php">
											recordttl:<p> <input type="text" name="recordttl" value="1440"></br></br>
											action:<p> <select name="action">
													<option value="NoAction"> NoAction </option>
													<option value="NativelyForward"> NativelyForward </option>
													<option value="SendMapRequest"> SendMapRequest </option>
													<option value="Drop"> Drop </option>
													</select><br><br>
											authoritative:<p> <input type="radio" name="authoritative" value="true" checked>True
															  <input type="radio" name="authoritative" value="false">False</br></br>
											ipv4_prefix_eid:<p> <input type="text" name="ipv4_prefix_eid" value="1.1.1.1">/<input type="text" name="mask" value="32"><br><br>/
											locator_id_path1:<p> <input type="text" name="locator_id_path1" value="path1"></br></br>
											priority_path1:<p> <input type="text" name="priority_path1" value="1"></br></br>
											weight_path1:<p> <input type="text" name="weight_path1" value="30"></br></br>
											multicastPriority_path1:<p> <input type="text" name="multicastPriority_path1" value="255"></br></br>
											multicastWeight_path1:<p> <input type="text" name="multicastWeight_path1" value="0"></br></br>
											localLocator_path1:<p> <input type="radio" name="localLocator_path1" value="true" checked>True
															  	   <input type="radio" name="localLocator_path1" value="false">False</br></br>
											rlocProbed_path1:<p> <input type="radio" name="rlocProbed_path1" value="true">True
															     <input type="radio" name="rlocProbed_path1" value="false" checked>False</br></br>
											routed_path1:<p>  <input type="radio" name="routed_path1" value="true" checked>True
															  <input type="radio" name="routed_path1" value="false">False</br></br>
											ipv4_prefix_rloc_path1:<p> <input type="text" name="ipv4_rloc_path1" value="1.1.1.1"></br></br>
											------------------------------------------------------------------------------</br></br>
											locator_id_path2:<p> <input type="text" name="locator_id_path2" value="path2"></br></br>
											priority_path2:<p> <input type="text" name="priority_path2" value="1"></br></br>
											weight_path2:<p> <input type="text" name="weight_path2" value="70"></br></br>
											multicastPriority_path2:<p> <input type="text" name="multicastPriority_path2" value="255"></br></br>
											multicastWeight_path2:<p> <input type="text" name="multicastWeight_path2" value="0"></br></br>
											localLocator_path2:<p> <input type="radio" name="localLocator_path2" value="true" checked>True
															  	   <input type="radio" name="localLocator_path2" value="false">False</br></br>
											rlocProbed_path2:<p> <input type="radio" name="rlocProbed_path2" value="true">True
															     <input type="radio" name="rlocProbed_path2" value="false" checked>False</br></br>
											routed_path2:<p>  <input type="radio" name="routed_path2" value="true" checked>True
															  <input type="radio" name="routed_path2" value="false">False</br></br>
											ipv4_prefix_rloc_path2:<p> <input type="text" name="ipv4_rloc_path2" value="1.1.1.2"></br></br>
											<input type="hidden" name="acao" value="addlb">
										        <input type="submit" value="Enviar"/></br>
										</form>
								</div>
							</div>
						</div>
					</div>
					<button type="button" class="btn btn-link" data-toggle="modal" data-target="#addmappingpelp" style="width:150px"> Add mapping ELP </button>
					<div id="addmappingpelp" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content" style="color:gray">
        						<div class="modal-header">
        							<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h1 class="modal-title">Add mapping ELP:</h1>
								</div>
								<div class="modal-body">
									<form method="get" action="php/Controle/mapping.php">
										recordttl:<p> <input type="text" name="recordttl" value="1440"></br></br>
										action:<p> <select name="action">
												<option value="NoAction"> NoAction </option>
												<option value="NativelyForward"> NativelyForward </option>
												<option value="SendMapRequest"> SendMapRequest </option>
												<option value="Drop"> Drop </option>
												</select><br><br>
										authoritative:<p> <input type="radio" name="authoritative" value="true" checked>True
														  <input type="radio" name="authoritative" value="false">False</br></br>
										ipv4_prefix_eid:<p> <input type="text" name="ipv4_prefix_eid" value="1.1.1.1">/<input type="text" name="mask" value="32"><br><br>/
										locator_id:<p> <input type="text" name="locator_id" value="path1"></br></br>
										priority:<p> <input type="text" name="priority" value="1"></br></br>
										weight:<p> <input type="text" name="weight" value="1"></br></br>
										multicastPriority:<p> <input type="text" name="multicastPriority" value="255"></br></br>
										multicastWeight:<p> <input type="text" name="multicastWeight" value="0"></br></br>
										localLocator:<p> <input type="radio" name="localLocator" value="true" checked>True
														  	   <input type="radio" name="localLocator" value="false">False</br></br>
										rlocProbed:<p> <input type="radio" name="rlocProbed" value="true">True
														     <input type="radio" name="rlocProbed" value="false" checked>False</br></br>
										routed:<p>  <input type="radio" name="routed" value="true" checked>True
													<input type="radio" name="routed" value="false">False</br></br>
										hop_id_router:<p> <input type="text" name="hop_id_router" value="router2"></br></br>			
										address_router:<p> <input type="text" name="address_router" value="192.168.201.2"></br></br>			
										lrs_bits_router:<p> <input type="text" name="lrs_bits_router" value="strict"></br></br>			
										hop_id_both:<p> <input type="text" name="hop_id_both" value="client2"></br></br>			
										address_both:<p> <input type="text" name="address_both" value="192.168.201.2"></br></br>			
										lrs_bits_both:<p> <input type="text" name="lrs_bits_both" value="strict"></br></br>			
										<input type="hidden" name="acao" value="addelp">
									    <input type="submit" value="Enviar"/></br>
									</form>
								</div>
							</div>
						</div>
					</div>
					<br><br>
					<div style="padding-left: 50px">
						<form role="form-role" method="get" action="php/Controle/mapping.php">
							<div class="form-group">
								<div class="col-xs-2" style="width:130px;padding-right:4px">
										<label for="ipv4-prefix"></label><input class="form-control" id="ipv4-prefix" type="text" name="ipv4_prefix_eid" value="192.168.0.6">
								</div>
								<div class="col-xs-2"; style="width:60px;padding-left:0px;">
										<label for="mask"></label><input class="form-control" id="mask" type="text" name="mask" value="32">
								</div>
						        <input type="hidden" name="acao" value="get"/>
						        <div style="padding-top: 20px;">
						    		<input type="submit" class="btn btn-default" data-toggle="collapse" data-target="#getkey" style="width:60px;float: left" value="Get" />
						    	</div>
							</div>
						</form>
						<br>
						<form role="form-role" method="get" action="php/Controle/mapping.php">
							<div class="form-group">
								<div class="col-xs-2" style="width:130px;padding-right:4px">
										<label for="ipv4-prefix"></label><input class="form-control" id="ipv4-prefix" type="text" name="ipv4_prefix_eid" value="192.168.0.6">
								</div>
								<div class="col-xs-2"; style="width:60px;padding-left:0px;">
										<label for="mask"></label><input class="form-control" id="mask" type="text" name="mask" value="32">
								</div>
						        <input type="hidden" name="acao" value="del"/>
						        <div style="padding-top: 20px;">
						    		<input type="submit" class="btn btn-default" data-toggle="collapse" data-target="#getkey" style="width:60px;float: left" value="Delete" />
						    	</div>
						</form>
					</div>
				</div>
				</div>
			</div>	
    	</div>
    </div>
</div>
<fieldset>
  <?php
		if(!isset($_SESSION['log']) || empty($_SESSION['log'])){
			echo '<div class="alert alert-success" style="text-align: center"> <strong> As descrições do serviço aparecerão aqui. </strong> <a href="json/logs/tmp" target="_blank"> Ver log de rede </a></div>';
		}

		else{
			echo '<div class="alert alert-success" style="text-align: center"> <strong> '.$_SESSION['log'].'. </strong> <a href="json/logs/tmp" target="_blank"> Ver log de rede </a></div>';
		}
		unset($_SESSION['log']);
	?>
	</fieldset>
	<fieldset style="width:800px; border: black;">
		<legend>
			WWW-DATA log<br>
		</legend>
	<?php
		echo shell_exec('if [ -f /var/www/html/tojson/logs/tmp ];then sed -e \'s/HTTP\/1.1 /<b>HTTP\/1.1 <\/b>/g\' /var/www/html/tojson/logs/tmp;rm /var/www/html/tojson/logs/tmp; else echo "Não existe registro de rede.";fi;');
	?>
	</fiedlset>
</body>
</html>
<!-- 
		<script> document.write('<input type=\"hidden\" name=\"serverODL\" value=\"'+serverODL+'\">') </script>
		<input type="submit" class="btn btn-info" value='Manage mappings'> -->
		<!-- </form> -->
<!-- <form method="get" action="forms/addkey.php">
					        <input type="submit" value="Add key"/>
						</form>
							<form method="get" action="forms/refreshkey.php">
					        <input type="submit" value="Update key"/>
						</form> -->