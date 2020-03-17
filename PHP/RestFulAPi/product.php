
<?php
 
 
 
class Product{
  
    // database connection and table name
    private $conn;
   
    // object properties
    
    public $Picture;
    public $Title;
    public $Description;
    public $Genre;
    public $Review;
    public $Developer;
    public $Trailer;
    public $id;
    public $ReleaseData;  
   
    function read(){
  
        // select all query
        $query = "SELECT
        *
    FROM myigdb.igdb
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
function searchz( $idForSearch,$TitleForSearch,$GenreForSearch,$DeveloperForSearch){
    



    // select all query
    $query="SELECT
    *
    FROM myigdb.igdb
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