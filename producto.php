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

	$producto = new Producto();

	$articulos = $producto->obtenerProductos( $conexion->pdo, 1, -1, $_GET['id'] );

?>
<div class="single_top">
		<?php
			foreach ($articulos as $articulo) {
				$articulo->vistaProducto(true);
			}
		?>
</div>
</section>