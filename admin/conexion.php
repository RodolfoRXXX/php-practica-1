<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "comercioit";
	
	$conexion = new PDO("mysql:host=" . $host . ";dbname=" . $db, $user, $pass);
	$conexion->exec("SET CHARACTER SET utf8");

?>