<?php

    require_once "class/producto.class.php";

    class Carrito{

        private $items;
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
        function mostrarItems($carrito){
            $sql = "SELECT P.idProducto, P.Nombre, P.Precio, M.Nombre AS Marca, C.Nombre AS Categoria, P.Presentacion, P.Stock, P.Imagen FROM productos AS P INNER JOIN marcas AS M ON M.idMarca = P.Marca INNER JOIN categorias AS C ON C.idCategoria = P.Categoria WHERE P.idProducto = IN(:arrayId)";
            //$stmt = $conexion->prepare($sql);

			//$stmt->execute(array(':id'=>$id));
        }

    }

?>