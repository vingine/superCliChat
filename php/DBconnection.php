<?php
//---------------------------------------------------------
/*		DB.php		SECURE kansiossa		*/

class myDbConnection{
	private $servername = "mydb.tamk.fi";
	private $username = "c4tpelto";
	private $password = "3rtR5RcD";
	private $dbname = "dbc4tpelto";
	
	private $connection;
	
	function __construct(){
		// construct object
		$this->connection = $this->connect();
	}
		
	private function connect(){
		try {
			$connection = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
			$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo "Connected successfully";
		}
	catch(PDOException $e)
		{
			//echo $sql . "<br>" . $e->getMessage();
			$connection = null;
			echo "Connected unsuccessfully";
		}
	}
	
	public function getConnection() {
		if($this->connection !== false){
			return $this->connection;
		}
		else return false;
	}
}
/*
function checkLogin($account,$passwordProvided) {
	// these things will execute
	$connection = new myDbConnection();
	if($connection->getConnection() === false){
		return "jotai meni pielee.";
	}
	
	try {
		$statement = $connection->getConnection()->prepare("SELECT password FROM Account WHERE name = :v1");
		$statement->bindParam(":v1", $account);
		$statement->execute();
		$password = $statement->fetch(PDO::FETCH_ASSOC)["password"];
	} catch (PDOException $e) {
		return false;
	}
	
	if(password_verify($passwordProvided,$password)) {
		try {
			$statement = $connection->getConnection()->prepare("UPDATE Account SET last_login = now() WHERE name=:boundValue");
			$statement->bindParam(":boundValue",$account);
			$statement->execute();
		} catch (PDOException $e) {} finally {
			return true;
		}
	} else {
		return "wrong pw :D";
	}
}

function saveMessage($username, $message) {
	
}
*/
function getMessages() {
	$connection = new myDbConnection();
	if ($connection->getConnection() === false) {
		echo "connection unsuccessful";
	} else {
		echo "connection successful";
	}
	
	try {
		$statement = $connection->getConnection()->prepare("SELECT message_id,  FROM Message");
		$statement->execute();
		$id = $statement->fetch(PDO::FETCH_ASSOC);
		$username = $connection->getConnection()->prepare("SELECT username FROM Message");
		$messagecontent = $connection->getConnection()->prepare("SELECT content FROM MessageBody");*/
		echo $id + " " + $username + $messagecontent;
	} catch (PDOException $e) {
		return false;
	}
}



/*function createAccount($account,$password){
	// these things will execute
	$connection = new myDbConnection();
	if($connection->getConnection() === false){
		return "jotai meni pielee.";
	}
	
	// use prepared statements to compare login values
	try{
		$statement = $connection->getConnection()->prepare("INSERT INTO Account (name,password,status) VALUES (:v1,:v2,'user')");
		$statement->bindParam(":v1",$account); //name
		$statement->bindParam(":v2",password_hash($password,PASSWORD_DEFAULT)); //pw
		$statement->execute();
		return true;
	}
	catch(PDOException $e){
		echo $sql . "<br>" . $e->getMessage();
		return false;
	}
}*/
?>