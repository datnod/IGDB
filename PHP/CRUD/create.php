<?php
/**
 * A page controller
 */
require "config.php";
require "src/functions.php";

// Get incoming values
$label  = $_POST["label"] ?? null;
$type   = $_POST["type"] ?? null;
$create = $_POST["create"] ?? null;
//var_dump($_POST);

if ($create) {
    // Connect to the database
    $db = connectDatabase($dsn);

    // Prepare and execute the SQL statement
    $sql = "INSERT INTO tech (label, type) VALUES (?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->execute([$label, $type]);

    // Get the results as an array with column names as array keys
    $sql = "SELECT * FROM tech";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll();
}



?><h1>Create an entry into the table</h1>

<form method="post">
    <fieldset>
        <legend>Create</legend>
        <p>
            <label>Label: 
                <input type="text" name="label" placeholder="Enter label">
            </label>
        </p>
        <p>
            <label>Type: 
                <input type="text" name="type" placeholder="Enter type">
            </label>
        </p>
        <p>
            <input type="submit" name="create" value="Create">
        </p>
    </fieldset>
</form>

<?php if ($res ?? null) : ?>
    <table>
        <tr>
            <th>Label</th>
            <th>Type</th>
        </tr>

    <?php foreach ($res as $row) : ?>
        <tr>
            <td><?= $row["id"] ?></td>
            <td><?= $row["label"] ?></td>
            <td><?= $row["type"] ?></td>
        </tr>
    <?php endforeach; ?>

    </table>
<?php endif; ?>
