<?php
?>
<html>
	<h1>Qual operação deseja realizar ?<h1>
	<form method="get" action="../php/Controle/key.php">
        <input type="hidden" name="action" value="add">
        <input type="submit" value="Add key"/>
	</form>
	<form method="get" action="../php/Controle/key.php">
        <input type="hidden" name="action" value="del">
        <input type="submit" value="Delete key"/>
	</form>
	<form method="get" action="../php/Controle/key.php">
        <input type="hidden" name="action" value="get">
        <input type="submit" value="Get key"/>
	</form>
	<form method="get" action="../php/Controle/key.php">
        <input type="hidden" name="action" value="refresh">
        <input type="submit" value="Refresh key"/>
	</form>
</html>
