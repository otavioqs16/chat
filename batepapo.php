<?php
	session_start();
	$con = mysqli_connect("localhost", "root", "#Golfinho16", "chat") or die("Falha ao conectar-se ao banco de dados!");

	$usuarioLogado = $_SESSION['usuario'];
	$userpv = $_SESSION['userpv'];

	$sql = "SELECT * FROM (SELECT * from mensagempv order by horario desc limit 10) sub order by horario asc";
	$result = mysqli_query($con, $sql);

	$busca = mysqli_num_rows($result);

	if($busca > 0){
		while ($linha = mysqli_fetch_assoc($result)) {
			if($usuarioLogado == $linha['idsource']){
				?>
				<div align="right"><label id="usereu"><?php echo $usuarioLogado . " :"; ?></label></div>
				<div align="right"><label class="eu"><?php echo htmlentities($linha['mensagem']) . "<br>";   ?></label></div>
				<?php
			}else{
				?>
				<div align="left"><label id="useroutro"><?php echo $linha['idrecep'] . " :"; ?></label></div>
				<div align="left"><label class="outro"><?php echo htmlentities($linha['mensagem']) . "<br>";?></label></div>
				<?php
			}
		}
	}
?>