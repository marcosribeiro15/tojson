
<?php

		echo shell_exec('if [ -f /var/www/html/tojson/logs/tmp ];then sed -e \'s/HTTP\/1.1 /<b><h1>HTTP\/1.1 </h2><\/b>/g\' /var/www/html/tojson/logs/tmp;rm /var/www/html/tojson/logs/tmp; else echo "Não existe registro de rede.";fi;');
		shell_exec('rm /var/www/html/tojson/logs/tmp;');
?>
