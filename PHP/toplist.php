<?php  $headerTitle = "Search DB"; include 'view/header.php';
$topinfo = "Top Games: ";
echo "<h2>" . $topinfo . "</h2>";
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM mydb.IGDB ORDER BY Review DESC; ";
$result = $conn->query($sql);


if ($result && $result->num_rows) {
    echo "<table><tr>    
            <th>Title</th>
            <th>Description</th>
            <th>Genre</th>
            <th>Rating!</th>
            <th>Release Data</th>
            <th>Developer/Publisher</th>
        </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>".$row["Title"]."</td>
        <td>".$row["Description"]."</td>
        <td>".$row["Genre"]."</td>
        <td>".$row["Review"]."</td>
        <td>".$row["Release Data"]."</td>
        <td>".$row["Developer"]."</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>