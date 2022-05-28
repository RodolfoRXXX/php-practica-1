<?php

	require_once './admin/config.php';
	require_once 'class/conexion.class.php';
	require_once 'class/producto.class.php';
	
	if(session_status() !== PHP_SESSION_ACTIVE) session_start();

	$parametros = array(
        'engineDb'=>MOTOR,
        'server'  =>SERVER,
        'nameDb'  =>DB,
        'user'    =>USER,
        'password'=>PASS
    );
    $conexion = new Conexion( $parametros );

	$productos = new Producto();

	$productosDestacados = $productos->obtenerProductos($conexion->pdo, 6, 1);

	$ultimosProductos = $productos->obtenerProductos($conexion->pdo, 3, 0);
	
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