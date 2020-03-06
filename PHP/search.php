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
FROM mydb.IGBD
WHERE
    idIGBD = ?
    OR Title LIKE ?
    OR Description LIKE ?
    OR Genre LIKE ?
    OR Review LIKE ?
    OR Release Data LIKE ?
    OR Developer/Publisher LIKE ?
    ;
EOD;
    $stmt = $db->prepare($sql);
    $stmt->execute([$search, $like, $like]);

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

<?php if ($search) : ?>
    <table>
        <tr>
            <th>idIGBD</th>
            <th>Title</th>
            <th>Description</th>
            <th>Genre</th>
            <th>Review</th>
            <th>Release Data</th>
            <th>Developer/Publisher</th>
        </tr>

    <?php foreach ($res as $row) : ?>
        <tr>
            <td><?= $row["idIGBD"] ?></td>
            <td><?= $row["Title"] ?></td>
            <td><?= $row["Description"] ?></td>
            <td><?= $row["Genre"] ?></td>
            <td><?= $row["Review"] ?></td>
            <td><?= $row["Release Data"] ?></td>
            <td><?= $row["Developer/Publisher"] ?></td>
            </tr>
    <?php endforeach; ?>

    </table>
    
<?php endif; ?>

