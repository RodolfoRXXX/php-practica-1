<?php

    require_once "class/producto.class.php";

    class Carrito{

        public $items;
        public $item = array('cantidad'=>1);

        public function __construct( array $array = array()){
            $this->items = array();
        }

        //------- Métodos -------

        public function verItems(){
            return $this->items;
        }

        function agregar($producto){
            if(isset($this->items[$producto->idProducto])){
                $this->items[$producto->idProducto]['cantidad']++;
            } else{
                $this->items[$producto->idProducto] = $this->item;
            }

        }
            //Método que agrega un producto al carrito
        function quitar($producto){
            if(isset($this->items[$producto->idProducto])){
                $this->items[$producto->idProducto]['cantidad']--;
                if($this->items[$producto->idProducto]['cantidad'] == 0){
                    unset($this->items[$producto->idProducto]);
                }
            }
        }
            //Método que quita un producto al carrito
        function mostrarItems($carrito, $pdo){
            $cantidad_total = 0;
            $precio_total   = 0.00;
            foreach($carrito->items as $key=>$valor){
                $x = Producto::buscarPorId($key, $pdo);
                $producto = new Producto($x->idProducto, $x->Nombre, $x->Precio, $x->Marca, $x->Categoria, $x->Presentacion, $x->Stock, $x->Imagen);
                //var_dump($producto);
                $cantidad_total += (int)$valor['cantidad'];
                $precio_total += (float)$producto->Precio;
            ?>
                <tr>
                    <th scope="row"><h4 class=""><?=$producto->idProducto ?></h4></th>
                    <td style="width: 10%; "><figure class="figure" style="max-width: 100%; "><img src="./images/productos/<?=$producto->Imagen ?>" class="figure-img img-fluid rounded" alt="./images/productos/<?=$producto->Nombre ?>"></figure></td>
                    <td><h3 class="text-center"><?=$producto->Nombre ?></h3></td>
                    <td><h3 class="text-center"><?=$producto->Marca ?></h3></td>
                    <td><h3 class="text-center"><?=$producto->Presentacion ?></h3></td>
                    <td><h3 class="text-center"><strong><?=$valor['cantidad'] ?></strong></h3></td>
                    <td><h3 class="text-center"><?='$'.$producto->Precio ?></h3></td>
                    <td class="text-center"><a name="" id="" class="btn btn-primary" href="?page=carrito&amp;quitarId=<?php echo $producto->idProducto ?>" role="button">Borrar</a></td>
                </tr>
            <?php
            } ?>
            <tr>
                    <th colspan=5></th>
                    <td><h3 class="text-center"><?=$cantidad_total ?></h3></td>
                    <td><h3 class="text-center"><strong><?='$'.$precio_total ?></strong></h3></td>
                    <td></td>
                </tr>
            <?php
        }

    }

?>