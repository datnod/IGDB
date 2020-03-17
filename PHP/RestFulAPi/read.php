<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
// database connection will be here

// include database and object files
include 'C:\xampp\htdocs\IGDB\PHP\RestFulAPi\database.php';
include 'C:\xampp\htdocs\IGDB\PHP\RestFulAPi\product.php';
// instantiate database and product object
$database = new Database();
$db = $database->connectDatabase();
  
// initialize object
$product = new Product($db);
  
// read products will be here

// query products
$stmt = $product->read();

$num = $stmt->rowCount();
  
// check if more than 0 record found
if($num>0){
  
    // products array
   $products_arr=array();
   $products_arr["IGDB"]=array();
  
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        
        extract($row);
  
        $product_item=array(
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
  
        array_push($products_arr["IGDB"], $product_item);
    }
  
    // set response code - 200 OK
    http_response_code(200);
  
    // show products data in json format
    
    echo json_encode($products_arr);


}

  
else{
  
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no products found
    echo json_encode(
        array("message" => "No Elements found.")
    );
}