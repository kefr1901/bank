<?php

include_once 'transaction.php';
include_once 'config.php';
include_once 'users.php';
//header("Access-Control-Allow-Origin: *");

//Kollar vilket request som kommer in, post/get
$requestMethod = $_SERVER["REQUEST_METHOD"];
$body_data = json_decode(file_get_contents('php://input'),true);

//Skapar nytt objekt av klassen Databas
$db = new Database();
//skapar nytt objekt av klassen Transaction och skickar med db objektet
$transaction = new Transaction($db);
//skapar nytt objekt av klassen User
$user = new User($db);

//Kollar vilket req som förfrågas/GET/POST och kallar på olika klasser och metoder beroende på vilket req
switch($requestMethod) {
	case 'POST':
		echo("kommer in i post REQ").PHP_EOL;
		//var_dump($body_data);
		//Data från användarinput från API 
		//$transaction_id = $body_data['transaction_id'];
		$from_account = $body_data['from_account'];
		$to_account = $body_data['to_account'];
		$to_amount = $body_data['to_amount'];
		//Skriver ut data i felsökningssyfte
		//echo($transaction_id).PHP_EOL;
		echo($from_account).PHP_EOL;
		echo($to_account).PHP_EOL;
		echo($to_amount).PHP_EOL;

		//Sätter värden från api med hjälp av metoder i klassen. 

	    //$transaction->setTransactionId($transaction_id);
	    $transaction->setFromAccount($from_account);
		$transaction->setToAccount($to_account);
		$transaction->setToAmount($to_amount);

		///////// KOLLA BALANCE //////////////

		try{
		//$transaction->getBalance($from_account);
			if($transactionInfo = $transaction->createTransaction($transaction->getBalance($from_account), $to_amount)) {
				echo ("Transction created");
			}
		}catch (Exception $e){
			echo 'Message: ' . $e->getMessage();
		}

		
	 

		//var_dump($transactionInfo);

		if(!empty($transactionInfo)) {
	      $js_encode = json_encode(array('status'=>TRUE, 'message'=>'Transaction created :D '), true);
        } else {
            $js_encode = json_encode(array('status'=>FALSE, 'message'=>'Transaction failed :( '), true);
        }
		//header('Content-Type: application/json');
		echo $js_encode;	
		break;


		///////////////////GET REQ HÄMTAR ALLA AVÄNDARE//////////////////////////////

		case 'GET':

			//Calling getAllUsers Method in User Class
			$userInfo = $user->getAllUsers();
			
			//Om userifo är tom får vi tillbaka ett error annars får vi success!
			if(!empty($userInfo)) {
				$js_encode = json_encode(array('status'=>TRUE, 'userInfo'=>$userInfo), true);
			} else {
				$js_encode = json_encode(array('status'=>FALSE, 'message'=>'Error, no users.'), true);
			}
			//header('Content-Type: application/json');
			echo $js_encode;
		break;
		
			

		}

	
		
	
		
