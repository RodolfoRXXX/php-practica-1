<?php

	require_once "class/conexion1.class.php";
	require_once 'class/producto.class.php';
	
	if(session_status() !== PHP_SESSION_ACTIVE) session_start();

	$conexion = Conexion::getInstance();

	$productosDestacados = Producto::obtenerProductos($conexion, 6, 1);

	$ultimosProductos = Producto::obtenerProductos($conexion, 3, 0);
	
?>
	<!-- PRODUCTOS DESTACADOS -->
	<div class="shoes-grid">
		<div class="products">
			<h5 class="latest-product">PRODUCTOS DESTACADOS</h5>
		</div>
		<div class="product-left">
		<?php
			foreach ($productosDestacados as $producto) {
				$producto->mostrarProducto(true);
			}
		?>
		</div>
		<div class="clearfix"> </div>
	</div>
	<!-- ULTIMOS PRODUCTOS -->
	<div class="shoes-grid">
		<div class="products">
			<h5 class="latest-product">ULTIMOS PRODUCTOS</h5>	
			<a class="view-all" href="?page=productos">VER TODOS<span></span></a>
		</div>
		<div class="product-left">
		<?php
			foreach ($ultimosProductos as $producto) {
				$producto->mostrarProducto();
			}
		?>
		</div>
		<div class="clearfix"> </div>
	</div>