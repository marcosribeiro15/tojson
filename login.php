<?php
session_start();
?>
<html>
<body>

<div class="menu">
				<form method="get" action = "Usuario/usuarioControle.php">
					<input type="hidden" name="acao" value="logar"/>
					Login: <input type="text" class="input_text" name="login" style="width:200px;background-color:transparent"/><br>
					Senha:<input type="password" class="input_text" name="senha" style="width:200px;background-color:transparent"/>
					<input type="submit" value="Entrar"/></br>
				</form>
				<div align="right">
					Não tem cadastro? <a href="cadastrarUsuario.php">Cadastre-se</a>
				</div>
				<?php
					}else {
					header('location:index.php');
					}
				?>

</body>
</html>