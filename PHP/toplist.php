<?php $headerTitle = "Top Games"; include 'view/header.php'; 
ini_set("allow_url_fopen", 1);
 $json = file_get_contents('http://localhost/home/IGDB/PHP/RestFulAPi/read.php');
 $obj = json_decode($json,TRUE);
//json hämtar IGDB
 $temp = $obj["igdb"];
 
?>





<link rel="stylesheet" href="css/style.css" type="text/css">
<div class = "center">

<h1>Top Games:</h1>

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

        
    <?php foreach ($temp  as $row) : ?>
            <tr>
            <td><img src="<?php echo $row['Picture']; ?>" width="175"  height="200" /></td>
            <td><?php  echo $row['Title']; ?></td>
            <td><?php  echo $row['Description']; ?></td>
            <td><?php  echo $row['Genre']; ?></td>
            <td><?php  echo $row['Review']; ?></td>
            <td><?php  echo $row['Release']; ?></td>
            <td><?php echo $row['Developer']; ?></td>
            <td>  
   <video width="320" height="240" controls>
  <source src="<?php echo $row['Trailer']; ?>" type="video/mp4">
    Your browser does not support the video tag.
        </video>   </td>
                   </tr>
    <?php endforeach; ?>
  




</table>
<?php
  function runMyFunction() {
 
 
    
  }

  if (isset($_GET['dbupdate'])) {
    runMyFunction();
  }
?> 
</div>   
<?php include 'view/footer.php';?>