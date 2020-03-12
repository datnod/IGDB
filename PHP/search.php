<?php $headerTitle = "Search DB"; include 'view/header.php';
ini_set("allow_url_fopen", 1);

// Get incoming values
$search = $_GET["search"] ?? null;
$like = "%$search%";



session_start(); 
 $_SESSION['ID']=$search;
 $_SESSION['Title']=$like;
 $_SESSION['Genre']=$like;
 $_SESSION['Developer']=$like;   
 

    


?>

<h2>Search the database</h2>
<form>
    <p>
        <label>Search: 
            <input  type="text" name="search" value="<?= $search              
            ?>">
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
            <th>Publisher</th>
            <th>Trailer</th>
            <th>Rate!</th>
            
        </tr>
        
    <?php foreach ((array)$test as $row) : ?>
        <tr>
            <td><img src="<?php echo $row['picture']; ?>" width="175"  height="200" /></td>
            <td><?php  echo $row['Title']; ?></td>
            <td><?php  echo $row['Description']; ?></td>
            <td><?php  echo $row['Genre']; ?></td>
            <td><?php  echo $row['Review']; ?></td>
            <td><?php  echo $row['Release']; ?></td>
            <td><?php echo $row['Developer']; ?></td>
            <td>  
            <iframe src="<?php echo $row['Trailer']; ?>"
            width="560" height="315" frameborder="0" allowfullscreen></iframe> </td>
            <td><button type="RATE" onclick="$stmt->execute($test,$test2);" value="">RATE</button></td>
        </tr>
    <?php endforeach; ?>


    </table>    
<?php endif; ?>
