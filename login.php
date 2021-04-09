<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<div id="a" class="jumbotron">
		<div id="main" class="container">
		<div id="topmain" align="center">
			<img src="chaticon.png" width="150px" height="150px">
		</div>	
		<form action="" method="post" enctype="multipart/form-data">
			<div id="errologin">
			</div>

			<div class="form-group">
			<label>Usuário</label>
			<input type="text" name="user" id="user" placeholder="Username" class="form-control">
			</div>

			<div class="form-group">
			<label>Senha</label>
			<input type="password" name="senha" id="senha" placeholder="********" class="form-control">
			</div>

			<div class="form-group">
			<input type="submit" name="enviar" id="enviar" class="form-control" value="Log in">
			<input type="hidden" name="enviar" value="login" id="enviar">
			<div id="create">
			<label>Don't have an account yet?</label>
			</div>
			<div id="sign">
			<a href="?pagina=cadastro">Sign up</a>
			</div>
			</div>
		</form>

		<?php
			
			if(isset($_POST['enviar'])){
				$usuario = $_POST['user'];
				$senha = $_POST['senha'];
				$enviar = $_POST['enviar'];
				$_SESSION['enviar'] = $_POST['enviar'];
				$_SESSION['usuario'] = $_POST['user'];
				$_SESSION['senha'] = $_POST['senha'];
				
				if(empty($usuario) || empty($senha)){
					?>
					<div class="eco"><?php echo "<code>Preencha todos os campos</code>"; ?></div>
					<?php
					
				}else{
					if($enviar){
						$sql = "SELECT usuario,senha from usuario where usuario = '$usuario' and senha = '$senha'";
						$result = mysqli_query($con, $sql);
						$linha = mysqli_fetch_assoc($result);

						if(mysqli_num_rows($result) <= 0){
							?>
							<div class="eco"><?php echo "<code>Login e/ou senha incorretos</code>"; ?></div>
							<?php
							
						}else{
							$_SESSION['usuario'] = $linha['usuario'];
							?>
							<div class="eco"><?php echo "<code>Entrando...</code>"; ?></div>
							<?php
							echo "<meta http-equiv='refresh' content='1.5; url=?pagina=chat'";
						}
					}
				}


			}
		?>
		</div>
	</div>
</body>
</html>