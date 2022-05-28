<?php require_once("init.php"); ?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<title>ComercioIT | Tu E-Shop en PHP</title>
	<base href="http://<?php echo $_SERVER["SERVER_NAME"] . DIR_RAIZ; ?>/">
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<!--theme-style-->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
	<!--//theme-style-->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!--fonts-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<!--//fonts-->
	<script src="js/jquery.min.js"></script>
	<!--script-->
	</head>
	<body> 
		<!--header-->
		<div class="header">
			<div class="bottom-header">
				<div class="container">
					<div class="header-bottom-left">
						<div class="logo"><a href="./">Comercio<strong>IT</strong></a></div>
						<div class="search">
							<input type="text" name="q">
							<input type="submit" value="BUSCAR">
						</div>
						<div class="clearfix"></div>
					</div>
					

					<div class="header-bottom-right">
						<ul class="login">
					<?php
						session_start();
						if ( isset( $_SESSION["Usuario"] ) ) {
					?>
							<li><a href="./admin/?page=panel"><span></span> BIENVENIDO <?php echo $_SESSION["Usuario"]["Nombre"]; ?></a></li>
					<?php } else { ?>
							<li><a href="./admin/?page=ingreso"><span></span> INGRESAR</a></li>
							&nbsp;|&nbsp;
							<li><a href="./admin/?page=registro">REGISTRARME</a></li>
					<?php } ?>
							&nbsp;|&nbsp;
							<li><a href="?page=contacto">CONTACTO</a></li>
							&nbsp;|&nbsp;
							<li><a href="?page=carrito">CARRITO</a></li>
						</ul>
						
						<div class="clearfix"></div>

					</div>


					<div class="clearfix"></div>	
				</div>
			</div>
		</div>
		<!---->
		<div class="container">