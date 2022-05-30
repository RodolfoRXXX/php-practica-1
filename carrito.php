<?php

    require_once "class/conexion1.class.php";
    require_once "class/producto.class.php";
    require_once "class/carrito.class.php";

    if(session_status() !== PHP_SESSION_ACTIVE) session_start();

    $conexion = Conexion::getInstance();

    if(isset($_SESSION['carrito'])){
        $carrito = unserialize($_SESSION['carrito']);
    } else{
        $carrito = new Carrito();
    }

    if(isset($_GET['agregarId'])){
        $x = Producto::buscarPorId($_GET['agregarId'], $conexion);
        $producto = new Producto($x->idProducto, $x->Nombre, $x->Precio, $x->Marca, $x->Categoria, $x->Presentacion, $x->Stock, $x->Imagen);
        $carrito->agregar($producto);
    }
    
    if(isset($_GET['quitarId'])){
        $x = Producto::buscarPorId($_GET['quitarId'], $conexion);
        $producto = new Producto($x->idProducto, $x->Nombre, $x->Precio, $x->Marca, $x->Categoria, $x->Presentacion, $x->Stock, $x->Imagen);
        $carrito->quitar($producto);
    }
?>
    <h3 class="m-3">Carrito de compras</h3>
    <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Estado</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $carrito->mostrarItems($carrito, $conexion);
            ?>
            </tbody>
    </table>

<?php
    $_SESSION['carrito'] = serialize($carrito);

?>