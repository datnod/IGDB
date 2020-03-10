<?php $headerTitle = "Top Games"; include 'view/header.php';

require "config.php";
require "connect.php";





// Connect to the database
$db = connectDatabase($dsn);

// Prepare and execute the SQL statement



$sql = <<<EOD
SELECT
    *
FROM mydb.IGDB
ORDER BY
    review
DESC 
    ;
EOD;




    

    $stmt = $db->prepare($sql);
    $stmt->execute();
    // Get the results as an array with column names as array keys
    $res = $stmt->fetchAll();


    $sql = "UPDATE mydb.IGDB
    SET Review = ?
    WHERE idIGDB = ?;";
    $stmt = $db->prepare($sql);
   
$test=1;
$test2=2;

?>

<?php 
 
 echo "<h2> Top Games: </h2>";


 
?>


<table>
        <tr>
            <th>Picture</th>
            <th>Title</th>
            <th>Description</th>
            <th>Genre</th>
            <th>Review</th>
            <th>Release</th>
            <th>Publisher</th>
            <th>Trailer</th>
            <th>Rate!</th>
            
        </tr>
    <?php foreach ($res as $row) : ?>
        <tr>
            <td><img src="<?php echo $row['picture']; ?>" width="175"  height="200" /></td>
            <td><?= $row["Title"] ?></td>
            <td><?= $row["Description"] ?></td>
            <td><?= $row["Genre"] ?></td>
            <td><?= $row["Review"] ?></td>
            <td><?= $row["Release Data"] ?></td>
            <td><?= $row["Developer"] ?></td>
            <td>  
   <video width="320" height="240" controls>
  <source src="<?php echo $row['Trailer']; ?>" type="video/mp4">
    Your browser does not support the video tag.
        </video>   </td>
            <td><button type="RATE" onclick="$stmt->execute($test,$test2);" value="">RATE</button></td>
        </tr>
    <?php endforeach; ?>


</table>
    
