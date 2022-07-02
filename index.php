<?php
session_start();
$con = mysqli_connect("us-cdbr-east-06.cleardb.net", "b9efdba306fef1", "81fd6aa9", "heroku_c701a48d385f15b") or die("Falha ao conectar-se ao banco de dados!");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Chat com PHP</title>
	<meta charset="utf-8">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	 <link rel="stylesheet" type="text/css" href="estilo.css">
	<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
</head>
<body>
	<?php

		if(isset($_GET['pagina'])){
			$pagina = $_GET['pagina'];
			include($pagina. ".php");
			
		}else{
			$pagina = "login";
			include($pagina. ".php");
		}

	?>
</body>
</html>
