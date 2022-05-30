<?php

	require_once 'class/conexion1.class.php';
	require_once 'class/producto.class.php';

	if(session_status() !== PHP_SESSION_ACTIVE) session_start();

    $conexion = Conexion::getInstance();

	$x = Producto::buscarPorId($_GET['id'], $conexion);

	$producto = new Producto($x->idProducto, $x->Nombre, $x->Precio, $x->Marca, $x->Categoria, $x->Presentacion, $x->Stock, $x->Imagen);

?>
<div class="single_top">
		<?php
				$producto->vistaProducto();
		?>
</div>
</section>