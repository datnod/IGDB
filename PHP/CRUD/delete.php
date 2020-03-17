<?php
/**
 * A page controller
 */
require "config.php";
require "src/functions.php";

// Get incoming values
$item  = $_GET["item"] ?? null;
$id    = $_POST["id"] ?? null;
$label = $_POST["label"] ?? null;
$type  = $_POST["type"] ?? null;
$delete  = $_POST["delete"] ?? null;
// var_dump($_GET);
// var_dump($_POST);

$db = connectDatabase($dsn);

$sql = "SELECT * FROM tech";
$stmt = $db->prepare($sql);
$stmt->execute();
$res1 = $stmt->fetchAll();
//var_dump($res1);

if ($item) {
    $sql = "SELECT * FROM tech WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$item]);
    $res2 = $stmt->fetch();
    //var_dump($res2);
}

if ($delete) {
    $sql = "DELETE FROM tech WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$id]);

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}



?><h1>Delete a row from the table</h1>

<form>
    <select name="item" onchange="this.form.submit()">
        <option value="-1">Select item</option>

        <?php foreach ($res1 as $row) : ?>
            <option value="<?= $row["id"] ?>"><?= "(" . $row["id"]. ") " . $row["label"] ?></option>
        <?php endforeach; ?>

    </select>
</form>


<?php if ($res2 ?? null) : ?>
<form method="post">
    <fieldset>
        <legend>Delete</legend>
        <p>
            <label>Id: 
                <input type="text" readonly="readonly" name="id" value="<?= $res2["id"] ?>">
            </label>
        </p>
        <p>
            <label>Label: 
                <input type="text" name="label" value="<?= $res2["label"] ?>">
            </label>
        </p>
        <p>
            <label>Type: 
                <input type="text" name="type" value="<?= $res2["type"] ?>">
            </label>
        </p>
        <p>
            <input type="submit" name="delete" value="Delete">
        </p>
    </fieldset>
</form>
<?php endif; ?>


<?php if ($res1 ?? null) : ?>
    <table>
        <tr>
            <th>Label</th>
            <th>Type</th>
        </tr>

    <?php foreach ($res1 as $row) : ?>
        <tr>
            <td><?= $row["id"] ?></td>
            <td><?= $row["label"] ?></td>
            <td><?= $row["type"] ?></td>
        </tr>
    <?php endforeach; ?>

    </table>
<?php endif; ?>
