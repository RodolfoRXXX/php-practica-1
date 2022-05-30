<?php

	require_once 'class/conexion1.class.php';
	require_once 'class/producto.class.php';

	if(session_status() !== PHP_SESSION_ACTIVE) session_start();

    $conexion = Conexion::getInstance();

	$producto = new Producto();

	$articulos = $producto->obtenerProductos( $conexion, 1, -1, $_GET['id'] );

?>
<div class="single_top">
		<?php
			foreach ($articulos as $articulo) {
				$articulo->vistaProducto(true);
			}
		?>
</div>
</section>