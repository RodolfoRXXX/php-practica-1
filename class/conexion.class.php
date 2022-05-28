<?php

class Conexion{
    private $engineDb = null;
    private $server   = null;
    private $user     = null;
    private $password = null;
    private $nameDb   = null;

    public $pdo;

    public function __construct(array $datos){
        $this->engineDb = $datos['engineDb'];
        $this->server   = $datos['server'];
        $this->user     = $datos['user'];
        $this->password = $datos['password'];
        $this->nameDb   = $datos['nameDb'];
        $ConnectionString = $this->engineDb.':host='.$this->server.';dbname='.$this->nameDb;
            
        try {
            $this->pdo = new PDO($ConnectionString, $this->user, $this->password);
        } catch (PDOException $e){
            echo $e->getMessage();
        }

    }
}
?>