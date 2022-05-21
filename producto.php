<?php
	require 'class/producto.class.php';
	require 'admin/conexion.php';

	/* Obtener desde la DB el producto elegido */
	$query = $conexion->query('SELECT P.idProducto, P.Nombre, P.Precio, M.Nombre AS Marca, C.Nombre AS Categoria, P.Presentacion, P.Stock, P.Imagen FROM productos AS P INNER JOIN marcas AS M ON M.idMarca = P.Marca INNER JOIN categorias AS C ON C.idCategoria = P.Categoria WHERE P.idProducto = '.$_GET['id']);

	$registro = $query->fetch(PDO::FETCH_ASSOC);
	$producto = new Producto($registro["idProducto"], $registro["Nombre"], $registro["Precio"], $registro["Marca"], $registro["Categoria"], $registro['Presentacion'], $registro["Stock"], $registro['Imagen']);

?>
<div class="single_top">
		<?php
				$producto->vistaProducto();
		?>
</div>
</section>