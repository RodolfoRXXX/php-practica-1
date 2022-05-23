<?php

	require 'class/producto.class.php';
	
	$productos = new Producto();

	$productosDestacados = $productos->obtenerProductos(6,1);

	$ultimosProductos = $productos->obtenerProductos(3,0);
	
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