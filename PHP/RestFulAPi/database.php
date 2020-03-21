<?php
/**
 * Database class.
 */
class Database{
  
    // specify your own database credentials
    private $host = "den1.mysql6.gear.host";
    private $db_name = "myigdb";
    private $username = "myigdb";
    private $password = "hejsan12334!";
    public $conn;
  
    // get the database connection
    public function connectDatabase(){
  
        $this->conn = null;
  
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
  
        return $this->conn;
    }
}
?>