<?php

	require 'class/producto.class.php';
	require 'admin/conexion.php';

	/* Obtener Productos Destacados */
	$query = $conexion->query("SELECT P.idProducto, P.Nombre, P.Precio, P.Imagen, P.Stock, M.Nombre AS Marca FROM productos AS P INNER JOIN marcas AS M ON M.idMarca = P.Marca WHERE P.Destacado = 1 LIMIT 0, 6");
	
	$productosDestacados = array();

	foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $registro) {
		
		$producto = new Producto($registro["idProducto"], $registro["Nombre"], $registro["Precio"], $registro["Marca"], null, null, $registro["Stock"], $registro['Imagen']);

		array_push($productosDestacados, $producto);
	}

	/* Obtener Ultimos Productos */
	$query = $conexion->query("SELECT P.idProducto, P.Nombre, P.Precio, P.Imagen, P.Stock, M.Nombre AS Marca FROM productos AS P INNER JOIN marcas AS M ON M.idMarca = P.Marca WHERE P.Destacado = 0 ORDER BY P.Stock DESC LIMIT 0, 6");
	
	$ultimosProductos = array();

	foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $registro) {
		
		$producto = new Producto($registro["idProducto"], $registro["Nombre"], $registro["Precio"], $registro["Marca"], null, null, $registro["Stock"], $registro['Imagen']);

		array_push($ultimosProductos, $producto);
	}
	
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