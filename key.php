<?php
session_start();

	if(isset($_GET["serverODL"]) && !empty($_GET["serverODL"])) $_SESSION['serverODL'] = $_GET['serverODL'];
	if(!isset($_SESSION['serverODL']) || empty($_SESSION['serverODL'])) header('location: index.php');
	// else echo $_SESSION['serverODL'];
?>
<html>
	<h1>Qual operação deseja realizar ?</h1>
	<form method="get" action="forms/addkey.php">
        <input type="submit" value="Add key"/>
	</form>
		<form method="get" action="forms/refreshkey.php">
        <input type="submit" value="Update key"/>
	</form>
	<form method="get" action="php/Controle/key.php">
        <input type="hidden" name="action" value="get">
		GET:<br><br> IPV4_prefix_eid ->
		<input type="text" name="ipv4_prefix_eid" value="192.168.0.6">/
    	<input type="text" name="mask" value="32">
    	<input type="submit" value="Get key"/>
	</form>
		<form method="get" action="php/Controle/key.php">
        <input type="hidden" name="action" value="del">
        DELETE:<br><br> IPV4_prefix_eid ->
		<input type="text" name="ipv4_prefix_eid" value="192.168.0.6">/	
    	<input type="text" name="mask" value="32">
        <input type="submit" value="Delete key"/>
	</form>
	<fieldset>
		<legend>
			OPENDAYLIGHT log<br>
		</legend>
	<?php
		if(!isset($_SESSION['log']) || empty($_SESSION['log'])) echo 'As descrições do serviço aparecerão aqui.';
		else echo $_SESSION['log'];
		unset($_SESSION['log']);
	?>
	</fieldset>
	<fieldset>
		<legend>
			WWW-DATA log<br>
		</legend>
	<?php
		echo shell_exec('if [ -f /var/www/html/tojson/logs/tmp ];then sed -e \'s/HTTP\/1.1 /<b>HTTP\/1.1 <\/b>/g\' /var/www/html/tojson/logs/tmp;rm /var/www/html/tojson/logs/tmp; else echo "Não existe registro de rede.";fi;');
	?>
	</fiedlset>
</html>
