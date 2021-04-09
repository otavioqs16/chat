<?php
session_start();

$con = mysqli_connect("localhost", "root", "#Golfinho16", "chat") or die("Falha ao conectar");
	$usuario = $_SESSION['usuario'];
	$senha = $_SESSION['senha'];

	echo $usuario, $senha, $_SESSION['enviar'];
if(isset($_SESSION['enviar'])){
	$usuario = $_SESSION['usuario'];
	$senha = $_SESSION['senha'];

	if(empty($usuario) || empty($senha)){
		?>
		<div class="alert alert-danger">
  			<strong>Erro!</strong> Preencha todos os campos
		</div>
		<?php
	}
}

?>