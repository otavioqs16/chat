<!DOCTYPE html>
<html>
<head>
	<title>Chat</title>
	<meta charset="utf-8">
</head>
<body>
<div id="menuusuarios">
	<div id="usuarios" style="overflow:scroll;height:650px;width:97%;overflow:auto">
		<h4><b>Usuários</b></h4>
		<hr class="unic">
		<?php
		$sql = "SELECT * from usuario";
		$result = mysqli_query($con, $sql);
		$usuarioLogado = $_SESSION['usuario'];
		if(mysqli_num_rows($result) > 0){
			while($linha = mysqli_fetch_assoc($result)){
				if($linha['usuario'] != $usuarioLogado){
				?>
				<form action="" method="post">
				<table>
				<tr>
					<td><p><span class="glyphicon glyphicon-user"></span>  <b><?php echo $linha['usuario'] . "<br>";?></b><input type="submit" class="btn btn-info" value="Bate-Papo" id="botaousuario"><input type="hidden" name="env" value="<?php echo $linha['usuario'] ?>">
					</p></td>
				</tr>
				</table>
				</form>
				<hr class="unic">
				<?php
				if(isset($_POST['env'])){
					$usuarioBP = $_POST['env'];
					$_SESSION['userpv'] = $_POST['env'];
				}
				}
			}
		}else{
			echo "<code>Nenhum usuário encontrado</code>";
		}


		?>
	</div>
</div>
<div id="all">
	<div id="content" style="overflow:scroll;height:530px;width:100%;overflow:auto">	
	</div>
	<hr id="estilozo">
	<form action="" method="post" enctype="multipart/form-data">
		<div class="col-lg-12">
			<div class="input-group">
                        <input type="text" name="msg" id="mensagem" placeholder="Digite sua mensagem" class="form-control">
                        <span id="enviarmsg" class="input-group-btn">
                            <input type="submit" name="enviar" value="Send" class="btn btn-warning" id="env">
                            <input type="hidden" name="enviarmsg">
                        </span>
                    </div>
                </div>
		</div>
	</form>	

			<?php


				if(isset($_POST['enviarmsg'])){
					$mensagem = utf8_decode($_POST['msg']);
					$usuarioLogado = $_SESSION['usuario'];
					$_SESSION['mensagem'] = $_POST['msg'];

					if(empty($mensagem)){
						echo "<code>Digite uma mensagem</code>";
					}else{
						if(mysqli_query($con, "INSERT into mensagem(mensagem, horario, idSource) values ('$mensagem', now(), '$usuarioLogado')")){
						}else{
							echo "Falha ao enviar mensagem";
						}

					}



				}else if(isset($_SESSION['userpv'])){
					$usuarioLogado = $_SESSION['usuario'];
					$msg = $_SESSION['mensagem'];
					$idrecep = $_SESSION['userpv'];
					if(empty($mensagem)){
						
					}else{
						if(mysqli_query($con, "INSERT into mensagempv(mensagem, horario, idsource, idrecebe) values ('$msg', now(), '$usuarioLogado', '$idrecep')")){
						}else{
							echo "Falha ao enviar mensagem";
						}

					}

				}


			?>

</div>
</body>
</html>