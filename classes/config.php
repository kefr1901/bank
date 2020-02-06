<?php

class Database
{
    private $host    = 'localhost';
    private $port    = 3306;
    private $db      = 'bank';
    private $user    = 'root';
    private $pass    = '';
    private $charset = 'utf8mb4';
    private $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];
    public $pdo;

    public function __construct($host, $port, $db, $user, $pass)
    {
        $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$this->charset";

        try {
            $this->pdo = new PDO($dsn, $user, $pass, $this->options);
           // echo ("connected");
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}
