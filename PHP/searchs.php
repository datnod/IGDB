
<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// database connection will be here
// include database and object files
include 'C:\xampp\htdocs\IGDB\PHP\database.php';
include 'C:\xampp\htdocs\IGDB\PHP\product.php';  
// instantiate database and product object
$database = new Database();
$db = $database->connectDatabase();
// initialize object

$product = new Product($db);
  
// read products will be here

// query products

$search=$product->search();
$num = $search->rowCount();

  
// check if more than 0 record found
if($num>0){
  
    // products array
   $search_arr=array();
   $search_arr["SEARCHITEMS"]=array();
  
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $search->fetch(PDO::FETCH_ASSOC)){
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
  
        array_push($search_arr["SEARCHITEMS"], $search_item);
    }
  
    // set response code - 200 OK
    http_response_code(200);
  
    // show products data in json format
    
    echo json_encode($search_arr);


}

  
else{
  
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no products found
    echo json_encode(
        array("message" => "No Elements found.")
    );
}

 function arrayBAJS(){
    return $search_arr;
}