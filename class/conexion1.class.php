<?php

require "./admin/config.php";

//Clase Conexion con patrón de diseño SINGLETON

class Conexion 
{
    protected static $instance;
    protected static $motor = MOTOR;
    protected static $host = HOST;
    protected static $db = DB;
    protected static $user = USER;
    protected static $pass = PASS;

    //Método constructor y clonador privados para que no pueda clonarse ni instanciarse
    private function __construct(){}

    private function __clone(){}

    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new PDO(self::$motor.":host=".self::$host.";dbname=".self::$db, self::$user, self::$pass);
        }
        return self::$instance;
    }

}

//Cómo implementar? Así aseguramos una sola instancia de conexión a la DB y un solo camino
    /*
        $conexion = Conexion::getInstance();
    */

?>