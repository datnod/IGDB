<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
// include database and object files
include 'C:\xampp\htdocs\IGDB\PHP\database.php';
include 'C:\xampp\htdocs\IGDB\PHP\product.php';
  
// instantiate database and product object
$databasez = new Database();
$db = $databasez->connectDatabase();
  
// initialize object
$productz = new Product($db);
  

  
// query products
$stmtz = $productz->search();
$numz = $stmtz->rowCount();
  
// check if more than 0 record found
 

if($numz>0){
  
    // products array
    $searchItems_arr=array();
    $searchItems_arr["searchForGames"]=array();
  
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmtz->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
  
        $search_item=array(
            "idIGDB" =>  $idIGDB,
            "picture" => $picture,
            "Title" => $Title,
            "Description" => $Description,
            "Genre" => $Genre,
            "Review" => $Review,
            "Release" => $Release,
            "Developer" => $Developer,
            "Trailer" => $Trailer,       
        );
  
        array_push($searchItems_arr["searchForGames"], $search_item);
        
    }
  
    // set response code - 200 OK
    http_response_code(200);
    $_SESSION['data']=$searchItems_arr;
       // header("Refresh:0");
  

    // show products data
      
    echo json_encode($searchItems_arr);
  


}
  
else{
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no products found
    echo json_encode(
        array("No Value")
    );
}
?>