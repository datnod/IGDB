<?php $headerTitle = "About us"; include 'view/header.php'; 

/**
 * About page with an explanation of our project and team.
 */


$about = "About Us: ";
$team = "Team: Two and a Half Men!";
$members = "We are three folks in this project, Henrik Vihlborg, Oskar Forssman and Liridon Smailji.";
$roles = "Oskar is responsible for the database. Liridon is responsible for backend. Henrik is responsible for frontend.";

 echo "<h2>" . $about . "</h2>";
 echo "<h4>" . $team . "</h4>";
 echo "<h4>" . $members . "</h4>";
 echo "<h4>" . $roles . "</h4>";

?>