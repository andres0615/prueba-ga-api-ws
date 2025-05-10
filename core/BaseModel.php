<?php

class BaseModel {

    private $pdo;

    public function __construct()
    {
        // $dsn = "mysql:dbname=grupo_asistencia;host=127.0.0.1";
        $dsn = $this->getDsn();
        $username = DB_USER;
        $password = DB_PASSWORD;
        $this->pdo = new PDO($dsn,$username,$password);
    }

    public function getPDO()
    {
        return $this->pdo;
    }

    private function getDsn()
    {
        $host = DB_HOST;
        $port = DB_PORT;
        $dbName = DB_NAME;
        $dsn = "mysql:host=$host;port=$port;dbname=$dbName;charset=utf8mb4";

        return $dsn;
    }
    
}