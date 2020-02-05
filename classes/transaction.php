<?php


include_once "config.php";

class Transaction 
{
    private $db;
    public $transaction_id;
    public $from_account;
	public $to_account;
	public $to_amount;

	public function __construct($db) {
        $this->db = $db;
       
    }
   
 
    public function setTransactionId($transaction_id) {
        $this->transaction_id = $transaction_id;
    }
    public function setFromAccount($from_account) {
        $this->from_account = $from_account;
    }
    public function setToAccount($to_account) {
        $this->to_account = $to_account;
	}
	public function setToAmount($to_amount) {
        $this->to_amount = $to_amount;
	}
 
    // Skapa en transaktion POST
    public function createTransaction($balance, $amount) {
		
		/// JÄMFÖR BALANSEN
		
			$this->checkBalance($balance, $amount);


		
		echo("kommer in i createTransaction");
		//echo($this->from_account);
		try {
			//echo("kommer in i try");
    		//$this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
			$sql = 'INSERT INTO transactions (transaction_id, from_amount, from_account, from_currency, to_amount, to_account, to_currency, currency_rate)
			VALUES (:transaction_id, :from_amount, :from_account, :from_currency, :to_amount, :to_account, :to_currency, :currency_rate)';
			$data = [
			':transaction_id' => null,
			':from_amount' => $this->to_amount,
			':from_account' => $this->from_account,
			':from_currency' => "SEK",
			':to_amount' => $this->to_amount,
			':to_account' => $this->to_account,
			':to_currency' => "SEK",
			':currency_rate' => "1.000",
			
			];
			//echo("kommer till efter statement");
	    	$stmt = $this->db->pdo->prepare($sql);
	    	//$stmt->execute($data);
			//$status = $stmt->rowCount();
			return $stmt->execute($data);
			
 
		} catch (Exception $e) {
    		die("Error in query!");
		}
 
	
	}
	
	public function getBalance($from_account){

		//$sql = 'SELECT balance FROM bank.vw_users WHERE account_id = ' . $this->from_account;
		$sql = 'SELECT balance FROM bank.vw_users WHERE account_id = ' . $from_account;
		$stmt = $this->db->pdo->prepare($sql);
		$stmt->execute();
		
		$data = $stmt->fetchAll();

        echo($data[0]["balance"]);
   		return $data[0]["balance"];

	}	
	function checkBalance($balance, $amount){
		
		if($balance < $amount){
			throw new Exception("Not enough money!");
		}
		return true;


	}

	


}
 