<?php
include_once "config.php";

Class User
{
    public $name;
    public $balance;
    
    private $db;

    public function __construct($db)
    {
        $this->db = $db;

    }    
    function getallUsers(){
    $stmt = $this->db->pdo->prepare('SELECT * FROM vw_users');
    $stmt->execute();
    $data = $stmt->fetchAll();
    return ($data);
    }
 }
   



