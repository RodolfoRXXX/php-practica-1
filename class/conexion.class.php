<?php

class Conexion extends PDO{
    private $engineDb = null;
    private $server   = null;
    private $user     = null;
    private $password = null;
    private $nameDb   = null;

    public function __construct(array $datos){
        $this->engineDb = $datos['engineDb'];
        $this->server   = $datos['server'];
        $this->user     = $datos['user'];
        $this->password = $datos['password'];
        $this->nameDb   = $datos['nameDb'];
        $ConnectionString = $this->engineDb.':host='.$this->server.';dbname='.$this->nameDb;
            parent::__construct($ConnectionString, $this->user, $this->password);

    }
}
?>