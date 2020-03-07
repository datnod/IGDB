<?php $headerTitle = "Top 10"; include 'view/header.php'; 

/**
 * Top list that will contain top rated games.
 */

$topinfo = "Top 10 Games: ";

echo "<h2>" . $topinfo . "</h2>";

require "config.php";
require "connect.php";

// Get incoming values
$top = $_GET["search"] ?? null;
$like = "%$top%";

if ($top) {
    // Connect to the database
    $db = connectDatabase($dsn);

    // Prepare and execute the SQL statement
    $sql = <<<EOD
SELECT
    *
FROM mydb.IGDB
WHERE
    idIGDB = ?
    OR Review ?
    ;
EOD;
    $stmt = $db->prepare($sql);
    $stmt->execute([$top, $like]);

    // Get the results as an array with column names as array keys
    $res = $stmt->fetchAll();
}

?>

<table>
        <tr>
        <th>Picture</th>       
            <th>Title</th>
            <th>Description</th>
            <th>Genre</th>
            <th>Review</th>
            <th>Release Data</th>
            <th>Developer/Publisher</th>
        </tr>
       
</table>        