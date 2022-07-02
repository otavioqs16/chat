<?php
session_start();

$con = mysqli_connect("us-cdbr-east-06.cleardb.net", "b9efdba306fef1", "81fd6aa9", "heroku_c701a48d385f15b") or die("Falha ao conectar");
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