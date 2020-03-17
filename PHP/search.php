<?php $headerTitle = "Search DB"; include 'view/header.php';
include_once '..\PHP\RestFulAPI\database.php';
include_once '..\PHP\RestFulAPI\product.php';

// instantiate database and product object
$databasez = new Database();
$db = $databasez->connectDatabase();  
// initialize object
$productz = new Product($db);
  
// Get incoming values
$search = $_GET["search"] ?? null;
$like = "%$search%";

// query products
$stmtz = $productz->searchz($search,$like,$like,$like);
$numz = $stmtz->rowCount();
  
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
            "Title" => $Title,
            "Description" => $Description,
            "Genre" => $Genre,
            "Review" => $Review,
            "Release" => $Release,
            "Developer" => $Developer,
            "Picture" => $Picture,
            "Trailer" => $Trailer,       
        );
  
        array_push($searchItems_arr["searchForGames"], $search_item);
        
    }
  
    // set response code - 200 OK
    http_response_code(200);
    
       // header("Refresh:0");
  

    // show products data
    $temp = $searchItems_arr["searchForGames"];    
        
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
<link rel="stylesheet" href="css/style.css" type="text/css">
<div class = "center">
<h2>Search the database</h2>
<form>
    <p>
        <label>Search: 
            <input  type="text" name="search" value="<?= $search              
  ?>" >
 
        </label>
    </p>
</form>


<?php if ($search) : ?>
    

    <table>
        <tr>
            <th>Picture</th>
            <th>Title</th>
            <th>Description</th>
            <th>Genre</th>
            <th>Review</th>
            <th>Release</th>
            <th>Developer</th>
            <th>Trailer</th>
            
            
        </tr>
        
    <?php foreach ((array)$temp as $row) : ?>
        <tr>
            <td><img src="<?php echo $row['Picture']; ?>" width="175"  height="200" /></td>
            <td><?php  echo $row['Title']; ?></td>
            <td><?php  echo $row['Description']; ?></td>
            <td><?php  echo $row['Genre']; ?></td>
            <td><?php  echo $row['Review']; ?></td>
            <td><?php  echo $row['Release']; ?></td>
            <td><?php echo $row['Developer']; ?></td>
            <td>  
            <iframe src="<?php echo $row['Trailer']; ?>"
            width="560" height="315" frameborder="0" allowfullscreen></iframe> </td>
            
        </tr>
    <?php endforeach; ?>



    </table>    

    </div>
<?php endif; ?>
<?php include 'view/footer.php';?>