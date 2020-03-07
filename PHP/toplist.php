<?php $headerTitle = "Top Games"; include 'view/header.php';

require "config.php";
require "connect.php";

// Get incoming values
$search = $_GET["review"] ?? null;
$like = "%$search%";

//var_dump($_GET);

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
    $stmt->execute([$search, $like]);

    // Get the results as an array with column names as array keys
    $res = $stmt->fetchAll();

?>

<?php ?>
    <table>
        <tr>
            <th>Picture</th>
            <th>Title</th>
            <th>Description</th>
            <th>Genre</th>
            <th>Review</th>
            <th>Release</th>
            <th>Publisher</th>
        </tr>

    <?php foreach ($res as $row) : ?>
        <tr>

        <td><img src="<?php echo $row['picture']; ?>" width="175"  height="200" /></td>
            <td><?= $row["Title"] ?></td>
            <td><?= $row["Description"] ?></td>
            <td><?= $row["Genre"] ?></td>
            <td><?= $row["Review"] ?></td>
            <td><?= $row["Release Data"] ?></td>
            <td><?= $row["Developer/Publisher"] ?></td>
            </tr>
    <?php endforeach; ?>

    </table>
    
    <?php ?>