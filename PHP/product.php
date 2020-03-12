
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
   
    
    





    
  
// search products
function search(){
  
  

    

    session_start(); 
    if(isset($_SESSION['ID'])){
        $idForSearch=$_SESSION['ID'];
        }
    if(isset($_SESSION['Title'])){
        $TitleForSearch=$_SESSION['Title'];      
    }
    if(isset($_SESSION['Genre'])){
        $GenreForSearch=$_SESSION['Genre'];      
    }
    if(isset($_SESSION['Developer'])){
        $DeveloperForSearch=$_SESSION['Developer'];      
    }
    
    
  
  
    


    // select all query
    $query="SELECT
    *
    FROM mydb.IGDB
    WHERE
    idIGDB = ?
    OR Title LIKE ?
    OR Genre LIKE ?
    OR Developer LIKE ?
      ;";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);  
        
     

    // bind
    $stmt->bindParam(1, $idForSearch);
    $stmt->bindParam(2, $TitleForSearch);
    $stmt->bindParam(3, $GenreForSearch);
    $stmt->bindParam(4, $DeveloperForSearch);
 
   // execute query
    $stmt->execute();
  
    return $stmt;
}

// constructor with $db as database connection
public function __construct($db){
    $this->conn = $db;
}




}

?>