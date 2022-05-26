<?php

if(session_status() !== PHP_SESSION_ACTIVE) session_start();

include_once "class/producto.class.php";
include_once "class/conexion.class.php";
include_once "class/carrito.class.php";

    if(isset($_SESSION['carrito'])){
        $carrito = unserialize($_SESSION['carrito']);
    } else{
        $carrito = new Carrito();
    }

    if(isset($_GET['agregarId'])){
        $x = Producto::buscarPorId($_GET['agregarId']);
        $producto = new Producto($x->idProducto, $x->Nombre, $x->Precio, $x->Marca, $x->Categoria, $x->Presentacion, $x->Stock, $x->Imagen);
        $carrito->agregar($producto);
    }

    if(isset($_GET['quitarId'])){
        $carrito->quitar($_GET['quitarId']);
    }
?>
    
<table width=100% border=2>
    <tr>
        <td align="top" align="center">
            <h3>Listado Productos</h3>
            <?php
                $carrito->mostrarItems($carrito);

            ?>
        </td>
    
    </tr>
    
</table>

<?php
    $_SESSION['carrito'] = serialize($carrito);

?>