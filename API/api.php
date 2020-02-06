<?php

		require_once('../vendor/autoload.php');
		include_once '../classes/transaction.php';
		include_once '../classes/config.php';
		include_once '../classes/users.php';
		error_log(__DIR__);
		$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
		$dotenv->load();


		//Kollar vilket request som kommer in, post/get
		$requestMethod = $_SERVER["REQUEST_METHOD"];
		$body_data = json_decode(file_get_contents('php://input'),true);
		//Skapar nytt objekt av klassen Databas
		$db = new Database($_ENV['DB_HOST'],$_ENV['DB_PORT'],$_ENV['DB_DATABASE'],$_ENV['DB_USER'],$_ENV['DB_PASS']);
		//skapar nytt objekt av klassen Transaction och skickar med db objektet
		$transaction = new Transaction($db);
		//skapar nytt objekt av klassen User
		$user = new User($db);

		////////////POST REQUEST //////////////////////
		switch($requestMethod) {
		case 'POST':
		$from_account = $body_data['from_account'];
		$to_account = $body_data['to_account'];
		$to_amount = $body_data['to_amount'];
		//////Sätter värden från api med hjälp av metoder i klassen /////////
	    $transaction->setFromAccount($from_account);
		$transaction->setToAccount($to_account);
		$transaction->setToAmount($to_amount);

		////////////CHECK BALANCE//////////////
		try{
			if($transactionInfo = $transaction->createTransaction($transaction->getBalance($from_account), $to_amount)) {
			}
		}catch (Exception $e){
			 $response = [
				"message"=>  $e->getMessage()
			 ];
			 header("Content-Type: application/json; charset=UTF-8");
			 echo json_encode($response);
			 exit;
		}

		if(!empty($transactionInfo)) {
	      $js_encode = json_encode(array('status'=>TRUE, 'message'=>'Transaction created :D '));
        } else {
            $js_encode = json_encode(array('status'=>FALSE, 'message'=>'Transaction failed :( '));
        }
		//header('Content-Type: application/json');
		echo $js_encode;	
		break;
		////////////////////// GET REQUEST //////////////////////////
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

	
		
	
		
