<?php

    class Carrito{

        private $items;

        public function __construct(){
            $this->items = array();
        }

        //------- Métodos -------

        function agregar($producto){
            
            if(isset($this->items[$producto->idProducto])){
                $this->items[$producto->idProducto]->Cantidad++;
            } else{
                $this->items[$producto->idProducto] = $producto;
            }
            var_dump($this->items);

        }

        function quitar($quitarId){
            /*if(isset($this->items[$producto->idProducto])){
                if($this->items[$producto->idProducto]->Stock == 1){
                    unset($this->items[$producto->idProducto]);
                } else{
                    $this->items[$producto->idProducto]->Stock--;
                }
            }*/
        }

        function mostrarItems($carrito){
            $this->items = $carrito;
        }

    }

?>