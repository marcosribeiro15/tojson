<?php session_start(); ?>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Cadastrar usuario</title>
		<link rel="stylesheet" type="text/css" href="formatacao.css" media="screen">
		<script>
			function verificarSenha(){
				var senhaUsuario = document.getElementById("senha").value;
				var senhaUsuario2 = document.getElementById("senha2").value;
				if(senhaUsuario == senhaUsuario2) return true;
				else{
					alert("Senhas não Conferem");
					return false;
				}  		
			}  	
		</script>
	</head>
<body>
	<div id="background"></div>
		<div id="container">
		<div class="content">
				<form method="get" action="usuarioControle.php">
				<fieldset>
					<legend>Tela do Usuário</legend>
					<input type="hidden" name="acao" value="<?php if( !empty($_SESSION['login'])) echo 'atualizar'; else echo 'registrar';?>"/>
					<?php if( empty($_SESSION['login'])) echo 'Login do Usuario: <input type="text" name="login"/><br/>'; ?>
					Senha do Usuario: <input type="password" name="senha" id="senha"/><br/>
					Repita a Senha: <input type="password" name="senha2" id="senha2"/><br>
					Servidor ODL:  <input type="text" name="serverODL" value="<?php if( !empty($_SESSION['serverODL'])) echo $_SESSION['serverODL']; ?>"/>
					<br>
					<input type="submit" value="Cadastrar Usuário" onclick="return verificarSenha(); " />
				</fieldset>
				</form>
			</div>
</body>
</html>