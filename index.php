<?php
session_start();
include_once 'usuarioControle.php';
?>
<!DOCTYPE html>

<html lang="en">
<head>
  <title>Plano de controle LISP</title>
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
.col-xs-2{
	display: block;
	width:70%;
	float: middle;
	text-align: center;
	}
</style>

<?php
		if(!isset($_SESSION['login']) || empty($_SESSION['login'])) header('location: login.php');
?>
	<div class="header">
		Plano de controle LISP
	</div>
<body>    
    <div class="container-fluid" style="padding-top: 100px"> 
    	<div class="col-sm-5" style="margin-bottom: 50px;">
    		<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#keys" style="width:150px; margin-bottom: 10px"> Gerenciar senhas </button>
		    	<div id="keys" class="collapse" style="width: auto">
					<!-- cadastrar chave -->
					<button type="button" class="btn btn-link" data-toggle="modal" data-target="#addkey" style="width:150px"> Adicionar senha </button>
					<div id="addkey" class="modal fade" role="dialog">
					<div class="modal-dialog">
							<div class="modal-content"  style="color:gray">
        						<div class="modal-header">
        							<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h1 class="modal-title">Adicionar senha</h1>
								</div>
								<div class="modal-body">
								<form method="get" action="php/Controle/key.php">
									EID:<p> <input type="text" name="ipv4_prefix_eid" value="1.1.1.1">/
														<input type="text" name="mask" value="32"></br></br>
									Senha:<p> <input type="text" name="key_string" value="lisp-passwd"/></br></br>
									Tipo de senha:<p> <input type="text" name="key_type" value="1"/></br></br>
									<input type="hidden" name="action" value="add"/></br></br>
								        <input type="submit" value="Enviar"/></br>
								</form>
								</div>
							</div>
						</div>
					</div>
					<!-- atualizar chave -->
					<button type="button"  class="btn btn-link" data-toggle="modal" data-target="#refreshkey" style="width:150px;"> Atualizar senha </button>
					<div id="refreshkey" class="modal fade" role="dialog">
					<div class="modal-dialog">
							<div class="modal-content"  style="color:gray">
        						<div class="modal-header">
        							<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h1 class="modal-title">Atualizar senha</h1>
								</div>
								<div class="modal-body">
								<form method="get" action="php/Controle/key.php">
									EID:<p> <input type="text" name="ipv4_prefix_eid" value="1.1.1.1">/
														<input type="text" name="mask" value="32"></br></br>
									Senha:<p> <input type="text" name="key_string" value="lisp-passwd"/></br></br>
									Tipo de senha:<p> <input type="text" name="key_type" value="1"/></br></br>
									<input type="hidden" name="action" value="refresh"></br></br>
								        <input type="submit" value="Atualizar"/></br>
								</form>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Get key -->
					<form role="form-role" method="get" action="php/Controle/key.php">
						<div class="form-group">
							<div class="col-xs-2" style="padding-left:40px;">
								<div class="col-xs-1" style="width: auto;padding: 1px 1px 1px 1px;">
									<input class="form-control" id="ipv4-prefix" type="text" name="ipv4_prefix_eid" value="192.168.0.6" style="width:130px">
								</div>
								<div class="col-xs-1" style="width: auto;padding: 1px 1px 1px 1px;">
									<input class="form-control" id="mask" type="text" name="mask" value="32" style="width:60px">
						        </div>
						        <input type="hidden" name="action" value="get"/>
						    	<div class="col-xs-1" style="width: auto;padding: 1px 1px 1px 1px;">
						    		<input type="submit" class="btn btn-default" data-toggle="collapse" data-target="#getkey" style="width:100px" value="Consultar" />
								</div>
							</div>
						</div>
					</form>
					<br>
					<!-- delete key -->
					<form role="form-role" method="get" action="php/Controle/key.php">
						<div class="form-group">
							<div class="col-xs-2" style="padding-left:40px;">
								<div class="col-xs-1" style="width: auto;padding: 1px 1px 1px 1px">
									<input class="form-control" id="ipv4-prefix" type="text" name="ipv4_prefix_eid" value="192.168.0.6" style="width:130px">
								</div>
								<div class="col-xs-1" style="width: auto;padding: 1px 1px 1px 1px">
									<input class="form-control" id="mask" type="text" name="mask" value="32" style="width:60px">
								</div>
					        <input type="hidden" name="action" value="del"/>
					        <div class="col-xs-1" style="width: auto;padding: 1px 1px 1px 1px;">
					    		<input type="submit" class="btn btn-default" data-toggle="collapse" data-target="#getkey" style="width:100px;float: left" value="Deletar" />
					    	</div>
						</div>
					</form>
				</div>
				</form>
			</div>
	    </div>
	    <div class="col-sm-7">
	    		<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#mappings" style="width:200px"> Gerenciar mapeamentos</button>
		    	<div id="mappings" class="collapse" style="padding-top: 20px">
					<button type="button" class="btn btn-link" data-toggle="modal" data-target="#addmappingpath" style="width:250px"> Adicionar mapeamento PATH </button>
					<div id="addmappingpath"  class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content"  style="color:gray">
        						<div class="modal-header">
        							<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h1 class="modal-title">Adicionar mapeamento PATH</h1>
								</div>
								<div class="modal-body">
										<form method="get" action="php/Controle/mapping.php">
											TTL:<p> <input type="text" name="recordttl" value="1440"></br></br>
											Ação:<p> <select name="action">
													<option value="NoAction"> NoAction </option>
													<option value="NativelyForward"> NativelyForward </option>
													<option value="SendMapRequest"> SendMapRequest </option>
													<option value="Drop"> Drop </option>
													</select><br><br>
											Autoritativo ?<p> <input type="radio" name="authoritative" value="true" checked>True
															  <input type="radio" name="authoritative" value="false">False</br></br>
											EID:<p> <input type="text" name="ipv4_prefix_eid" value="1.1.1.1">/<input type="text" name="mask" value="32"><br><br>
											ID do localizador:<p> <input type="text" name="locator_id" value="path1"></br></br>
											Prioridade:<p> <input type="text" name="priority" value="1"></br></br>
											Tamanho:<p> <input type="text" name="weight" value="30"></br></br>
											Prioridade por multicast:<p> <input type="text" name="multicastPriority" value="255"></br></br>
											Tamanho por multicast:<p> <input type="text" name="multicastWeight" value="0"></br></br>
											Localizador é local ?:<p> <input type="radio" name="localLocator" value="true" checked>True
															  	   <input type="radio" name="localLocator" value="false">False</br></br>
											RLOC ja foi sondado ?:<p> <input type="radio" name="rlocProbed" value="true">True
															     <input type="radio" name="rlocProbed" value="false" checked>False</br></br>
											Já foi encaminhado ?:<p>  <input type="radio" name="routed" value="true" checked>True
															  <input type="radio" name="routed" value="false">False</br></br>
											IP do RLOC:<p> <input type="text" name="ipv4_rloc" value="1.1.1.1"></br></br>
											<input type="hidden" name="acao" value="addpath">
										    <input type="submit" value="Enviar"/></br>
										</form>
								</div>
							</div>
						</div>
					</div>
					<button type="button" class="btn btn-link" data-toggle="modal" data-target="#addmappinglb" style="width:250px"> Adicionar mapeamento LB </button>
					<div id="addmappinglb" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content"  style="color:gray">
        						<div class="modal-header">
        							<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h1 class="modal-title"> Adicionar mapeamento LB</h1>
								</div>
								<div class="modal-body">
										<form method="get" action="php/Controle/mapping.php">
											TTL:<p> <input type="text" name="recordttl" value="1440"></br></br>
											Ação:<p> <select name="action">
													<option value="NoAction"> NoAction </option>
													<option value="NativelyForward"> NativelyForward </option>
													<option value="SendMapRequest"> SendMapRequest </option>
													<option value="Drop"> Drop </option>
													</select><br><br>
											Autoritativo ?<p> <input type="radio" name="authoritative" value="true" checked>True
															  <input type="radio" name="authoritative" value="false">False</br></br>
											EID: <p> <input type="text" name="ipv4_prefix_eid" value="1.1.1.1">/<input type="text" name="mask" value="32"><br><br>
											ID do localizador 1:<p> <input type="text" name="locator_id_path1" value="path1"></br></br>
											Prioridade:<p> <input type="text" name="priority_path1" value="1"></br></br>
											Tamanho:<p> <input type="text" name="weight_path1" value="30"></br></br>
											Prioridade por multicast:<p> <input type="text" name="multicastPriority_path1" value="255"></br></br>
											Tamanho por multicast:<p> <input type="text" name="multicastWeight_path1" value="0"></br></br>
											Localizador é local ?<p> <input type="radio" name="localLocator_path1" value="true" checked>True
															  	   <input type="radio" name="localLocator_path1" value="false">False</br></br>
											RLOC ja foi sondado ?<p> <input type="radio" name="rlocProbed_path1" value="true">True
															     <input type="radio" name="rlocProbed_path1" value="false" checked>False</br></br>
											Já foi encaminhado ?<p>  <input type="radio" name="routed_path1" value="true" checked>True
															  <input type="radio" name="routed_path1" value="false">False</br></br>
											IP do RLOC:<p> <input type="text" name="ipv4_rloc_path1" value="1.1.1.1"></br></br>
											------------------------------------------------------------------------------</br></br>
											ID do localizador 2:<p> <input type="text" name="locator_id_path2" value="path2"></br></br>
											Prioridade:<p> <input type="text" name="priority_path2" value="1"></br></br>
											Tamanho:<p> <input type="text" name="weight_path2" value="70"></br></br>
											Prioridade por multicast:<p> <input type="text" name="multicastPriority_path2" value="255"></br></br>
											Tamanho por multicast:<p> <input type="text" name="multicastWeight_path2" value="0"></br></br>
											Localizador é local ?<p> <input type="radio" name="localLocator_path2" value="true" checked>True
															  	   <input type="radio" name="localLocator_path2" value="false">False</br></br>
											RLOC ja foi sondado ?<p> <input type="radio" name="rlocProbed_path2" value="true">True
															     <input type="radio" name="rlocProbed_path2" value="false" checked>False</br></br>
											Já foi encaminhado ?<p>  <input type="radio" name="routed_path2" value="true" checked>True
															  <input type="radio" name="routed_path2" value="false">False</br></br>
											IP do RLOC:<p> <input type="text" name="ipv4_rloc_path2" value="1.1.1.2"></br></br>
											<input type="hidden" name="acao" value="addlb">
										        <input type="submit" value="Enviar"/></br>
										</form>
								</div>
							</div>
						</div>
					</div>
					<button type="button" class="btn btn-link" data-toggle="modal" data-target="#addmappingpelp" style="width:250px"> Adicionar mapeamento ELP </button>
					<div id="addmappingpelp" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content" style="color:gray">
        						<div class="modal-header">
        							<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h1 class="modal-title">Adicionar mapeamento ELP</h1>
								</div>
								<div class="modal-body">
									<form method="get" action="php/Controle/mapping.php">
										TTL:<p> <input type="text" name="recordttl" value="1440"></br></br>
										Açao:<p> <select name="action">
												<option value="NoAction"> NoAction </option>
												<option value="NativelyForward"> NativelyForward </option>
												<option value="SendMapRequest"> SendMapRequest </option>
												<option value="Drop"> Drop </option>
												</select><br><br>
										Autoritativo:<p> <input type="radio" name="authoritative" value="true" checked>True
														  <input type="radio" name="authoritative" value="false">False</br></br>
										EID:<p> <input type="text" name="ipv4_prefix_eid" value="1.1.1.1">/<input type="text" name="mask" value="32"><br><br>
										ID do localizador:<p> <input type="text" name="locator_id" value="path1"></br></br>
										Prioridade:<p> <input type="text" name="priority" value="1"></br></br>
										Tamanho:<p> <input type="text" name="weight" value="1"></br></br>
										Prioridade por multicast:<p> <input type="text" name="multicastPriority" value="255"></br></br>
										Tamanho por multicast:<p> <input type="text" name="multicastWeight" value="0"></br></br>
										Localizador é local ?<p> <input type="radio" name="localLocator" value="true" checked>True
														  	   <input type="radio" name="localLocator" value="false">False</br></br>
										RLOC ja foi sondado ?<p> <input type="radio" name="rlocProbed" value="true">True
														     <input type="radio" name="rlocProbed" value="false" checked>False</br></br>
										Já foi encaminhado ? <p>  <input type="radio" name="routed" value="true" checked>True
													<input type="radio" name="routed" value="false">False</br></br>
										Roteador(Salto):<p> <input type="text" name="hop_id_router" value="router2"></br></br>			
										Endereço do roteador:<p> <input type="text" name="address_router" value="192.168.201.2"></br></br>			
										lrs_bits:<p> <input type="text" name="lrs_bits_router" value="strict"></br></br>			
										Cliente:<p> <input type="text" name="hop_id_both" value="client2"></br></br>			
										Endereço do cliente:<p> <input type="text" name="address_both" value="192.168.201.2"></br></br>			
										lrs_bits:<p> <input type="text" name="lrs_bits_both" value="strict"></br></br>			
										<input type="hidden" name="acao" value="addelp">
									    <input type="submit" value="Enviar"/></br>
									</form>
								</div>
							</div>
						</div>
					</div>
					<br><br>
						<form role="form-role" method="get" action="php/Controle/mapping.php" style="float: center">
							<div class="form-group">
							<div class="col-xs-2" style="padding-left:180px;">
								<div class="col-xs-1" style="width: auto;padding: 1px 1px 1px 1px;">
									<input class="form-control" id="ipv4-prefix" type="text" name="ipv4_prefix_eid" value="192.168.0.6" style="width:130px">
								</div>
								<div class="col-xs-1" style="width: auto;padding: 1px 1px 1px 1px;">
									<input class="form-control" id="mask" type="text" name="mask" value="32" style="width:60px">
								</div>
						        <input type="hidden" name="acao" value="get"/>
						        <div class="col-xs-1" style="width: auto;padding: 1px 1px 1px 1px;">
						    		<input type="submit" class="btn btn-default" data-toggle="collapse" data-target="#getkey" style="width:100px" value="Consultar" style="padding-top: 20px;"/>
						    	</div>
							</div>
						</form>
						<br>
						<form role="form-role" method="get" action="php/Controle/mapping.php">
							<div class="form-group">
								<div class="col-xs-2" style="padding-left:180px;">
									<div class="col-xs-1" style="width: auto;padding: 1px 1px 1px 1px;">
											<input class="form-control" id="ipv4-prefix" type="text" name="ipv4_prefix_eid" value="192.168.0.6" style="width:130px">
									</div>
									<div class="col-xs-1" style="width: auto;padding: 1px 1px 1px 1px;">
											<input class="form-control" id="mask" type="text" name="mask" value="32" style="width:60px">
									</div>
							        <input type="hidden" name="acao" value="del"/>
							        <div class="col-xs-1" style="width: auto;padding: 1px 1px 1px 1px;">
							    		<input type="submit" class="btn btn-default" data-toggle="collapse" data-target="#getkey" style="width:100px" value="Deletar" style="padding-top: 20px;" />
							    	</div>
							    </div>
						</form>
					</div>
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
			//info
			echo '<div class="alert alert-info" style="text-align: center"> <strong> As descrições do serviço aparecerão aqui. </strong></div>';
		}

		else{
			$sucessaddkey = 'Senha adicionada com sucesso';
			$sucessaddmap = 'Mapeamento adicionado com sucesso';
			$sucessget = 'output';
			$sucessrmkey = "Senha removida com sucesso";
			$sucessrmmap = "Mapeamento removido com sucesso";
			$sucessrfkey = "Senha atualizada com sucesso";
			//sucesso
			if(($_SESSION['log']) == $sucessaddkey || ($_SESSION['log']) == $sucessaddmap | substr(($_SESSION["log"]), 2, 6) == $sucessget | ($_SESSION['log']) == $sucessrmkey | ($_SESSION['log']) == $sucessrfkey | ($_SESSION['log']) == $sucessrmmap){
			echo '<div class="alert alert-success" style="text-align: center"> <strong> '.$_SESSION["log"].'. </strong> <a href="log-rede.php" target="_blank"> Ver log de rede </a></div>';
		}else {
		//fail
			echo '<div class="alert alert-danger" style="text-align: center"> <strong> '.$_SESSION["log"].'. </strong> <a href="log-rede.php" target="_blank"> Ver log de rede </a></div>';
		}
	}
		unset($_SESSION['log']);
	?>
</fieldset>


<div style="float: right; margin-right: 100px; margin-top: 50px">
				
<p>
IP do servidor ODL: <?php echo $_SESSION['serverODL']; ?>| <a href="Usuario/cadastrarUsuario.php ">Mudar servidor ODL</a> <br>
</p>
<p>
Bem vindo, <b><i><?php echo $_SESSION['login']; ?> </i></b>| <a href="Usuario/usuarioControle.php?acao=sair&login="<?php echo $_SESSION['login']; ?>>Logout</a> <br>
</p>
</div>


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