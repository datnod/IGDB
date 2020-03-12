
<?php
 
 
 
class Product{
  
    // database connection and table name
    private $conn;
   
    // object properties
    
    public $picture;
    public $Title;
    public $Description;
    public $Genre;
    public $Review;
    public $Developer;
    public $Trailer;
    public $id;
    public $Release;  
   
    function read(){
  
        // select all query
        $query = "SELECT
        *
    FROM mydb.IGDB
    ORDER BY
        review
    DESC ";
      
        // prepare query statement
        $stmt = $this->conn->prepare($query);
      
        // execute query
        $stmt->execute();
      
        return $stmt;
    }
   
    function search(){
  
        // select all query
        session_start(); 
        $idForSearch=$_SESSION['ID'];
        $TitleForSearch=$_SESSION['Title'];
        $GenreForSearch=$_SESSION['Genre'];
        $DeveloperForSearch=$_SESSION['Developer'];
         


       $query="SELECT
       *
       FROM mydb.IGDB
       WHERE
       idIGDB = ?
       OR Title LIKE ?
       OR Genre LIKE ?
       OR Developer LIKE ?
         ;";
       
       $temp1=$idForSearch;
       $temp2=$TitleForSearch;
       $temp3=$GenreForSearch;
       $temp4=$DeveloperForSearch;

        // prepare query statement
        $stmt = $this->conn->prepare($query);
      
        // execute query
        $stmt->execute([$temp1,$temp2,$temp3, $temp4]);
      
        return $stmt;
    }
    





    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
   
  
}

?>