<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
</head>
<body>
<div id="a" class="jumbotron">
	<div id="main" class="container">
		<div id="topmain" align="center">
			<img src="chaticon.png" width="150px" height="150px">
		</div>	
		<form action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
			<label>Usuário</label>
			<input type="text" name="user" id="user" placeholder="Usuário" class="form-control">
			</div>

			<div class="form-group">
			<label>Senha</label>
			<input type="password" name="senha" id="senha" placeholder="********" class="form-control">
			</div>

			<div class="form-group">
			<label>Confirmar senha</label>
			<input type="password" name="confirmasenha" id="senha" placeholder="********" class="form-control">
			</div>

			<div class="form-group">
			<input type="submit" name="cadastrar" id="cad" value="Cadastrar" class="form-control">
			<input type="hidden" name="cadastro" value="first">
			</div>
		</form>
		<?php
			
			if(isset($_POST['cadastrar'])){
				$usuario = $_POST['user'];
				$senha = $_POST['senha'];
				$confirmasenha = $_POST['confirmasenha'];
				
				if(empty($usuario) || empty($senha)){
					echo "<code>Preencha todos os campos</code>";
					
				}else{
					$sql = "SELECT usuario from usuario where usuario = '$usuario'";
					$resultado = mysqli_query($con, $sql);
					$linha = mysqli_fetch_assoc($resultado);
					$login = $linha['usuario'];

					if($login == $usuario){
						echo "<code>Esse login já existe!</code>";
					}else if($confirmasenha == $senha){
						$query = "INSERT INTO usuario(usuario, senha) values('$usuario', '$senha')";
						$inserir = mysqli_query($con, $query);

						if($inserir){
							echo "<code>Usuário cadastrado com sucesso! Redirecionando...</code>";
							echo "<meta http-equiv='refresh' content='1.5; url=?pagina=login'";
						}else{
							echo "<code>Não foi possível concluir o cadastro!</code>";
						}
					}else{
						echo "<code>Confirme sua senha novamente!</code>";
					}
				}


			}
		?>

		</div>
	</div>
</body>
</html>