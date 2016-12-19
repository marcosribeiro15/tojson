<?php
session_start();
?>
<html lang="en">
<head>
  <title>MapController Edition</title>
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
    text-align: center;
    background-color: #0275d8
}
.container-fluid{
	display: block;
    padding: 15px 20px 50px 50px;
    font-weight: 700;
    text-align: center;
}
</style>
<body>
    <div class="container-fluid" style="padding-top: 100px"> 
    	<div class="col-sm-8" style="margin-bottom: 50px;float:center;">
			<img src="capa-login.jpg" style="float: right; width:60%; height: 40%"/> <br> <br><br><br>
		</div>
		<div class="col-sm-8" style="margin-bottom: 50px;float:center;">
			<div class="menu">
				<form method="get" action="Usuario/usuarioControle.php">
					<input type="hidden" name="acao" value="logar"/>
					Login: <input type="text" class="input_text" name="login"/><br><br>
					Senha:<input type="password" class="input_text" name="senha"/><br><br>
					<input type="submit" value="Entrar"/></br>
				</form>
				<div align="right">
					Não tem cadastro? <a href="Usuario/cadastrarUsuario.php">Cadastre-se</a>
				</div>
			</div>
		</div>
</body>
</html>