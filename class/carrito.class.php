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
            if(isset($this->items[$producto->getId()])){
                $this->items[$producto->getId()]['cantidad']++;
            } else{
                $this->items[$producto->getId()] = $this->item;
            }

        }
            //Método que agrega un producto al carrito
        function quitar($producto){
            if(isset($this->items[$producto->getId()])){
                $this->items[$producto->getId()]['cantidad']--;
                if($this->items[$producto->getId()]['cantidad'] == 0){
                    unset($this->items[$producto->getId()]);
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
                $precio_total += (float)$producto->getPrecio();
            ?>
                <tr>
                    <th scope="row"><h4 class=""><?=$producto->getId() ?></h4></th>
                    <td style="width: 10%; "><figure class="figure" style="max-width: 100%; "><img src="./images/productos/<?=$producto->getImagen() ?>" class="figure-img img-fluid rounded" alt="./images/productos/<?=$producto->getNombre() ?>"></figure></td>
                    <td><h3 class="text-center"><?=$producto->getNombre() ?></h3></td>
                    <td><h3 class="text-center"><?=$producto->getMarca() ?></h3></td>
                    <td><h3 class="text-center"><?=$producto->getPresentacion() ?></h3></td>
                    <td><h3 class="text-center"><strong><?=$valor['cantidad'] ?></strong></h3></td>
                    <td><h3 class="text-center"><?='$'.$producto->getPrecio() ?></h3></td>
                    <td class="text-center"><a name="" id="" class="btn btn-primary" href="?page=carrito&amp;quitarId=<?php echo $producto->getId() ?>" role="button">Borrar</a></td>
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