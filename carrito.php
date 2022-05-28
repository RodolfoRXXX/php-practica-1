<?php

    require_once './admin/config.php';
    require_once "class/conexion.class.php";
    require_once "class/producto.class.php";
    require_once "class/carrito.class.php";

    if(session_status() !== PHP_SESSION_ACTIVE) session_start();

    $parametros = array(
        'engineDb'=>MOTOR,
        'server'  =>SERVER,
        'nameDb'  =>DB,
        'user'    =>USER,
        'password'=>PASS
    );
    $conexion = new Conexion( $parametros );

    if(isset($_SESSION['carrito'])){
        $carrito = unserialize($_SESSION['carrito']);
    } else{
        $carrito = new Carrito();
    }

    if(isset($_GET['agregarId'])){
        $x = Producto::buscarPorId($_GET['agregarId'], $conexion->pdo);
        $producto = new Producto($x->idProducto, $x->Nombre, $x->Precio, $x->Marca, $x->Categoria, $x->Presentacion, $x->Stock, $x->Imagen);
        $carrito->agregar($producto);
    }
    
    if(isset($_GET['quitarId'])){
        $x = Producto::buscarPorId($_GET['quitarId'], $conexion->pdo);
        $producto = new Producto($x->idProducto, $x->Nombre, $x->Precio, $x->Marca, $x->Categoria, $x->Presentacion, $x->Stock, $x->Imagen);
        $carrito->quitar($producto);
    }
?>
    
<table width=100% border=2>
    <tr>
        <td align="top" align="center" style="width: 75%;">
            <h3>Listado Productos</h3>
            <table style="width: 75%;">
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Comprar</th>
                </tr>
            <?php
                //$carrito->mostrarItems($carrito);
                //var_dump($carrito->verItems());
            ?>
        </td>
    
    </tr>
    
</table>

<?php
    $_SESSION['carrito'] = serialize($carrito);

?>