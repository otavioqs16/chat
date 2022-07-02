<?php
	session_start();
	$con = mysqli_connect("us-cdbr-east-06.cleardb.net", "b9efdba306fef1", "81fd6aa9", "heroku_c701a48d385f15b") or die("Falha ao conectar-se ao banco de dados!");

	$usuarioLogado = $_SESSION['usuario'];

	$sql = "SELECT * FROM (SELECT * from mensagem order by horario desc limit 15) sub order by horario asc";
	$result = mysqli_query($con, $sql);

	$busca = mysqli_num_rows($result);

	if($busca > 0){
		while ($linha = mysqli_fetch_assoc($result)) {
			if($usuarioLogado == $linha['idSource']){
				?>
				<div align="right"><label id="usereu"><?php echo $usuarioLogado . " :"; ?></label></div>
				<div align="right"><label class="eu"><?php echo htmlentities($linha['mensagem']) . "<br>";?></label></div>
				<hr class="unic2">
				<div class="meio" align="left"><label id="data"><?php echo $linha['horario']; ?></label></div>
				<hr class="unic3">
				<?php
			}else{
				?>
				<div align="left"><label id="useroutro"><?php echo $linha['idSource'] . " :"; ?></label></div>
				<div align="left"><label class="outro"><?php echo htmlentities($linha['mensagem']) . "<br>";?></label></div>
				<hr class="unic2">
				<div class="meio" align="left"><label id="data"><?php echo $linha['horario']; ?></label></div>
				<hr class="unic3">
				<?php
			}
		}
	}
?>