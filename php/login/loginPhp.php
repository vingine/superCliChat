<?php
//------------------------------------------------
//  DBlogin.php     SECURE kansiossa
//------------------------------------------------
    class myDbConnection
    {
        private $servername = "";
        private $username = "";
        private $password = "";
        private $dbname = "";

        private $connection;

        function __construct($host, $user, $password, $dbname)
        {
            // construct object

            $this->servername = $host;
            $this->user = $user;
            $this->password = $password;
            $this->dbname = $dbname;
            $this->connection = $this->connect();
        }

        private function connect()
        {
            try {
                $connection = new PDO("mysql:host=$this->servername;"
                                      ."dbname=$this->dbname",
                                      $this->username,
                                      $this->password);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // return the successful connection
                return $connection;
            }
            catch(PDOException $e)
            {
                //echo $sql . "<br>" . $e->getMessage();
                $connection = null;
                return false; // return failure
            }
        }

        public function getConnection()
        {
            if($this->connection !== false){
                return $this->connection;
            }
            else
            {
                return false;
            }
        }
    }

    function checkLogin($account,$password)
    {
        // these things will execute
        $connection = new myDbConnection("mydb.tamk.fi", "c3jmikko",
                                         "76S85hs3", "dbc3jmikko1");

        if ($connection->getConnection() === false)
        {
            return "Connection refused.";
        }

    }

    function accountExists($account)
    {
        // these things will execute
        $connection = new myDbConnection("mydb.tamk.fi", "c3jmikko",
                                         "76S85hs3", "dbc3jmikko1");
        if($connection->getConnection() === false)
        {
            return "Connection refused.";
        }
    }

    function createAccount($account,$password)
    {
        // these things will execute
        $connection = new myDbConnection("mydb.tamk.fi", "c3jmikko",
                                         "76S85hs3", "dbc3jmikko1");
        if($connection->getConnection() === false)
        {
            return "Connection refused.";
        }

        // use prepared statements to compare login values
        try
        {
            $statement = $connection->getConnection()->prepare("INSERT INTO Account (name,password,status) VALUES (:v1,:v2,'user')");
            $statement->bindParam(":v1",$account); //name
            $statement->bindParam(":v2",password_hash($password,PASSWORD_DEFAULT,)); //pw
            $statement->execute();
            return true;
        }
        catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
            return false;
        }
    }
?>