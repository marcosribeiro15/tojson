<html>

<script>
	var serverODL = prompt(' Digite <ip>:<port> do servidor ODL.\n Exemplo: 127.0.0.1:8181')
</script>

<form name="serverODL" method="get" action="index.php">
<script> document.write('<input type=\"hidden\" name=\"serverODL\" value=\"'+serverODL+'\">') </script>
</form>

<script>document.serverODL.submit()</script>

</html>