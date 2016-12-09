<?php
?>
<html>
	<h1>Qual operação deseja realizar ?<h1>
	<form method="get" action="../php/Controle/mapping.php">
        <input type="hidden" name="action" value="add">
        <input type="submit" value="Add mapping"/>
	</form>
	<form method="get" action="../php/Controle/mapping.php">
        <input type="hidden" name="action" value="del">
        <input type="submit" value="Delete mapping"/>
	</form>
	<form method="get" action="../php/Controle/mapping.php">
        <input type="hidden" name="action" value="get">
        <input type="submit" value="Get mapping"/>
	</form>
	<form method="get" action="../php/Controle/mapping.php">
        <input type="hidden" name="action" value="refresh">
        <input type="submit" value="Refresh mapping"/>
	</form>
</html>
