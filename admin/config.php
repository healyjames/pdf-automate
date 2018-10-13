<?php

//Configuration for database connection

class Connection {
    
    
    private $dsn = "mysql:host=localhost;dbname=price";   //Data Source Name
    
    private $host = "localhost";
    
    private $username = "root";
    
    private $password = "toor";
    
    private $dbname = "price";
    
    private $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );
    
    
    protected $conn;    //Proteced: visible in all classes that extend current class.
    
    
    public function openConnection(){
        try {
            
            $this->conn = new PDO($this->dsn, $this->username, $this->password, $this->options);
            
            //Returns connection
            return $this->conn;
            
        }catch(PDOException $e){
            
            echo "Error. There is an issue with the database connection: " . $e->getMessage();
            
        }
    }
    
    public function closeConnection(){
        $this->conn = NULL;
    }
}




/**
*        $this: References to the current object. $conn in a function would create a new variable.
*/


?>