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

	$x = Producto::buscarPorId($_GET['id'], $conexion->pdo);

	$producto = new Producto($x->idProducto, $x->Nombre, $x->Precio, $x->Marca, $x->Categoria, $x->Presentacion, $x->Stock, $x->Imagen);

?>
<div class="single_top">
		<?php
				$producto->vistaProducto();
		?>
</div>
</section>