<?php
session_start();

if($_SESSION["validUser"] === "Peter"){
  echo "Welcome to CRUD";
  var_dump($_SESSION['validUser']);
  session_destroy();
}else{ 
    header("Location: index.php");
    exit;
}

?>