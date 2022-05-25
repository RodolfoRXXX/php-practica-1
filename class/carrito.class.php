<?php

    class Carrito{

        public $items;

        public function __construct(){
            $this->items = array();
        }

        //------- Métodos -------

        function agregar($agregarId){

            /*if(isset($this->items[$agregarId])){
                $this->items[$agregarId]++;
            } else{
                $this->items[$agregarId] = 1;
            }

            var_dump($this->items);*/
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