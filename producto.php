<?php
	require 'class/producto.class.php';

	$producto = new Producto();

	$articulos = $producto->obtenerProductos( 1, -1, $_GET['id'] );

?>
<div class="single_top">
		<?php
			foreach ($articulos as $articulo) {
				$articulo->vistaProducto(true);
			}
		?>
</div>
</section>