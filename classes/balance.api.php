<?php
// Header
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once 'config.php';
include_once 'transaction.php';
// Instantiate Db and connect
$db = new Database();

// Instantiate transaction Object
$transaction = new Transaction($db);
// Get ID from URL
$transaction->id = isset($_GET['id']) ? $_GET['id'] : die();
// Get User balance
$transaction->getBalance($transaction->id);



//print_r($transaction_amount);