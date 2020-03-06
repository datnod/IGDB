<?php $headerTitle = "Search DB"; include 'view/header.php';



require "config.php";
require "connect.php";

// Get incoming values
$search = $_GET["search"] ?? null;
$like = "%$search%";
//var_dump($_GET);

if ($search) {
    // Connect to the database
    $db = connectDatabase($dsn);

    // Prepare and execute the SQL statement
    $sql = <<<EOD
SELECT
    *
FROM mydb.IGDB
WHERE
    idIGDB = ?
    OR Title LIKE ?
      ;
EOD;
    $stmt = $db->prepare($sql);
    $stmt->execute([$search, $like]);

    // Get the results as an array with column names as array keys
    $res = $stmt->fetchAll();
}




?><h2>Search the database</h2>

<form>
    <p>
        <label>Search: 
            <input type="text" name="search" value="<?= $search ?>">
        </label>
    </p>
</form>

<?php if ($search = "wow") {
$im = imagecreatefromjpeg( 
    'https://en.wikipedia.org/wiki/World_of_Warcraft#/media/File:WoW_Box_Art1.jpg');
     header('Content-type: image/jpg');   
imagejpeg($im); 
imagedestroy($im); 
} ?>

